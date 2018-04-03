Vue.component('opcion', {
    props: ['name','clase','opciones'],
    data: function () {
        return {
            id: '',
        }
    },
    methods: {},
    created: function () {
    },
    computed: {
    },
    template: ' <select :name="name" :class="clase">' +
    '<option></option>' +
    '<option v-if="opciones" v-for="op, index in opciones" :key="op.id" :value="op.id">{{op.opcion}}</option>' +
    '</select>'
})