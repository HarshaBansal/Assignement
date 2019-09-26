$(function () {
    if ($('#generate-cards').length) {
        new Vue({
            el: '#generate-cards',
            data: {
                url: '',
                userId: '',
                computerCards: '',
            },
            methods: {
                submit() {
                    this.userId = $('[name=user_id]').val();
                    this.computerCards = $('[name=computer_cards]').val();
                    
                    var data = {
                        user_id: this.userId,
                        computer_cards: this.computerCards
                    }
                    
                    this.url = $('[name=result-url]').val();
                    
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
