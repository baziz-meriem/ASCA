import axios from 'axios';
import auth from './auth.js';

export default {
    getloggedUser(){
        var token = localStorage.getItem('laravel-token');
        if(!token) {
            return null;
        }
         token = JSON.parse(token).user.id;//to extract the access_token from the data
        
        return id;
    },
    Register(user) {
        return axios.post('/api/auth/Register',user);
    },

    SignIn (user) {
        return axios.post('/api/auth/SignIn',user)
        .then(response => {
            if(response.status === 200) {
                this.setToken(response.data)
            }
            return response.data;
        });
    },

    setToken(user) {
        localStorage.setItem('laravel-token',JSON.stringify(user));//storing the token in the local storage
    },

    isLoggedIn() {
        const token = localStorage.getItem('laravel-token');
        return token != null;
    },
     logout(){
        const token = auth.getAccessToken();
        axios.get('/api/auth/logout/',{
        headers: { 
            'Authorization': `Bearer ${token}`
        }
    }).then(() => {
        localStorage.removeItem('laravel-token');//remove token from the local storage
    })
     },

     getAccessToken() {
        var token = localStorage.getItem('laravel-token');
        if(!token) {
            return null;
        }
         token = JSON.parse(token).access_token;//to extract the access_token from the data
        
        return token;
     }

}

