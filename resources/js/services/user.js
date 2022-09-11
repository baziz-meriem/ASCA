import axios from 'axios';
import user from './user.js';

export default {
     citoyenScope() {
        return axios.get('/api/citoyen/citoyen-scope');
     },
     adminScope() {
        return axios.get('/api/admin/admin-scope')
     },
}