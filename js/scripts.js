const { createApp } = Vue;

createApp({
    data() {
        return {
            discs: []
        }
    },
    created() {
        axios
            .get('http://localhost/php-dischi-json/read.php')
            .then(response => {
                this.discs = response.data;
            });
    }
}).mount('#app')