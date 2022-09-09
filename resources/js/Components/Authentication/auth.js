import axios from 'axios';

export default {
    register(user) {
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
        localStorage.setItem('laravel-token',JSON.stringify(user));
    },

    isLoggedIn() {
        const token = localStorage.getItem('laravel-token');
        return token != null;
    }

}

