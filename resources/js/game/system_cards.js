$(function () {
    if ($('#system-cards').length) {
        new Vue({
            el: '#system-cards',
            data: {
                url: '',
                userId: '',
                systemCards: '',
            },
            methods: {
                submit() {
                    this.userId = $('[name=user_id]').val();
                    this.systemCards = $('[name=system_cards]').val();
                    
                    var data = {
                        user_id: this.userId,
                        system_cards_data: this.systemCards
                    }
                    
                    this.url = $('[name=store-system-cards-data-url]').val();
                    
                    axios.post(this.url, data)
                         .then((response) => {
                             window.location = response.data.redirect
                         }).catch((error) => {
                        let messages = error.response.data.error.message;
                        
                        messages = _.join(messages, '<br>');
                        
                        alert(messages);
                    });
                }
            },
        });
    }
});
