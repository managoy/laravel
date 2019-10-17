import Vue from 'vue';
import axios from 'axios';

var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
})


var app3 = new Vue({
    el: '#app-3',
    data: {
        seen: true
    }
})

var app4 = new Vue({
    el: '#app-4',
    data: {
        todos: [
            { text: 'Learn JavaScript' },
            { text: 'Learn Vue' },
            { text: 'Build something awesome' }
        ]
    }
})

var app5 = new Vue({
    el: '#app-5',
    data: {
        message: 'Hello Vue.js!'
    },
    methods: {
        reverseMessage: function () {
            this.message = this.message.split('').reverse().join('')
        }
    }
})

var app7 = new Vue({
    el:'#app-7',
    data(){
        return{
            name:'',
            email:'',
            phone:'',
        };


    },
    methods:{
        postData: function(e){
            debugger;
            e.preventDefault();
            let currentObj = this;
            axios.post('/api/formSubmit',{
                name: this.name,
                email: this.email,
                phone: this.phone
            })
                .then(function (response){
                    currentObj.output = response.data;
                    alert("Data Succesfully Inserted");
                })
                .catch(function(error){
                    currentObj.output = error;
                });

        }
    }
})
