import axios, {AxiosPromise, AxiosResponse} from "axios";
import {getLocalToken} from '../../../utils/auth';

/*let token = getLocalToken();*/

interface HasId {
    id?: number
}

export class ApiSync<T extends HasId> {
    config;

    constructor(public rootUrl: string) {
        /*this.config = {
            headers: { Authorization: `${token.token_type} ${token.access_token}` }
        }*/
    }

    fetch(id: number): AxiosPromise {
        // return axios.get(`${this.rootUrl}/${id}`, this.config);
        return axios.get(`${this.rootUrl}/${id}`, this.config);
    }

    save(data: T): AxiosPromise {
        const id = data.id;

        const form = new FormData();

        for(let key in data){
            form.set(key, data[key] as any);
        }

        /*if(id)
            return axios.put(`${this.rootUrl}/${id}`, form, this.config);

        return axios.post(this.rootUrl, form, this.config);*/
        if(id)
            return axios.put(`${this.rootUrl}/${id}`, form);

        return axios.post(this.rootUrl, form);
    }
}
