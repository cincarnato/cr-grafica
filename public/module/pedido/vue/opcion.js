Vue.component('opcion', {
    props: ['name','clase','opciones'],
    data: function () {
        return {
          value:'',
          opcion:{
            id: '',
            opcion: '',
            precio: ''
          }
        }
    },
    methods: {
      changeOpcion: function () {
        this.$emit('changeopcion', this.value);
      }
    },
    created: function () {
    },
    computed: {
    },
    template: ' <select :name="name" :class="clase" v-on:change="changeOpcion" v-model="value">' +
    '<option></option>' +
    '<option v-if="opciones" v-for="op, index in opciones" :key="op.id" :value="op.id" >{{op.opcion}} - ${{op.precio}}</option>' +
    '</select>'
})