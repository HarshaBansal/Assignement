$(function () {
    if ($('#card').length) {
        new Vue({
            el: '#card',
            data: {
                url: '',
                userId: '',
                userCard: '',
            },
            methods: {
                submit() {
                    this.userId = $('[name=user_id]').val();
                    this.userCard = $('[name=cards]').val();
                    
                    var data = {
                        user_id: this.userId,
                        user_cards_data: this.userCard
                    }
                    
                    this.url = $('[name=cards-data-url]').val();
                    
                    axios.post(this.url, data)
                         .then((response) => {
                             window.location = response.data.redirect
                         }).catch((error) => {
                        let messages = error.response.data.error;
                        
                        messages = _.join(messages, '<br>');
                        
                        alert(messages);
                    });
                }
            },
        });
    }
});
