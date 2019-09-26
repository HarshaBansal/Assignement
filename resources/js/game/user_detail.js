$(function () {
    if ($('#user-details').length) {
        new Vue({
            el: '#user-details',
            data: {
                url: '',
                name: ''
            },
            methods: {
                submit() {
                    this.name = $('[name=name]').val();
                    
                    var data = {
                        name: this.name,
                    }
                    
                    this.url = $('[name=user-data-url]').val();
                    
                    axios.post(this.url, data)
                         .then((response) => {
                             window.location = response.data.redirect
                         });
                }
            },
        });
    }
});
