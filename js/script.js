const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: [],
            singleDisc: null,
            newDisc: {
                name: '',
                artist: '',
                genre: '',
                year: 1900,
            },
            creationError: false
        }
    },
    created() {
        axios
            .get('http://localhost/php-dischi-json/server.php')
            .then(response => {
                this.discs = response.data;
            });
    },
    methods: {
        getSingleDisc(id) {
            if (!id) {
                alert('Disco non trovato PRIMA DELLA CHIAMATA');
            }
            else {
                axios
                    .get('http://localhost/php-dischi-json/single.php', {
                        params: {
                            id: id
                        }
                    })
                    .then(response => {
                        if (response.data == null) {
                            alert('Disco non trovato DOPO LA CHIAMATA');
                        }
                        else {
                            this.singleDisc = response.data;
                        }
                    });
            }
        },
        hideSingleDiscModal() {
            this.singleDisc = null;
        },
        storeDisc() {
            console.log(this.newDisc);
        
            axios
                .post('http://localhost/php-dischi-json/store.php', {
                    info: this.newDisc
                }, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(res => {
                    if (res.data == 'error') {
                        this.creationError = true;
                    }
                    else if (res.data == 'success') {
                        this.creationError = false;

                        window.location.href = 'http://localhost/php-dischi-json/index.html';
                    }
                        
                    console.log(res.data);
                });
        }
    }
}).mount('#app')