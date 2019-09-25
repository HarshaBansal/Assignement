$(function () {
    if ($('#first').length) {
        new Vue({
            el: '#first',
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
