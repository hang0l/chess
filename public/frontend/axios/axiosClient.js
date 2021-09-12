import axios from "axios";

export default class AxiosClient {
    static process(method, url, data = null) {
        const headers = {
            Accept: 'application/json'
        }
        if(localStorage.accessToken) {
            headers.Autorisation = 'Bearer ' + localStorage.accessToken
        }

        switch (method){
            case 'post':
                return axios({
                    method: 'post',
                    url: url,
                    data: data,
                    headers: headers,
                })
            case 'get':
                return axios({
                    method: 'get',
                    url: url,
                    headers: headers,
                })
        }

    }
}
