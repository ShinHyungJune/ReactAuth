import {AxiosPromise, AxiosResponse} from "axios";

interface HasId {
    id?: number
}

interface Attribute<T> {
    set(value: T): void;
    getAll(): T;
    get<K extends keyof T>(key: K): T[K];
}

interface Sync<T> {
    fetch(id: number): AxiosPromise;
    save(data: T): AxiosPromise;
}

interface Event {
    on(eventName: string, callback: () => {}): void;
    trigger(eventName: string): void;
}

export class Model<T extends HasId> {
    constructor(
        private attributes: Attribute<T>,
        private events: Event,
        private sync: Sync<T>
    ){};

    get on() {
        return this.events.on;
    }

    get trigger() {
        return this.events.trigger;
    }

    get get() {
        return this.attributes.get;
    }

    get getAll() {
        return this.attributes.getAll;
    }

    set(data: T): void {
        this.attributes.set(data);

        this.events.trigger("change");
    }

    fetch(): AxiosPromise {
        const id = this.get("id");

        if(typeof id !== 'number')
            throw new Error("Cannot fetch without an id");

        const axiosPromise = this.sync.fetch(id);

        axiosPromise.then((response: AxiosResponse): void => {
            this.set(response.data.data);
        });

        return axiosPromise;
    }

    save(): AxiosPromise {
        return this.sync.save(this.attributes.getAll());
    }
}
