Vue.component('preview', {
    props: ['dibujo', 'color', 'colorFondo', 'nombre', 'logoPropio'],
    methods: {},
    created: function () {
    },
    computed: {
        cstyle: function () {
            return 'color:' + this.color + ';';
        },
        cfstyle: function () {
            return 'height: 80px; background-color:' + this.colorFondo + ';';
        }
    },
    template: `
    <div class="row">
    
      <div class="col-xs-12">
      
          <div class="bwhite">
          
              <div class="col-lg-3 col-xs-3 text-center">
              <img v-if="logoPropio == 1" src="/media/dibujos/logoPropio.png" class="img-responsive" style="widht:80px;height:80px;" />
               <img v-else :src="dibujo.src" class="img-responsive" style="widht:80px;height:80px;" />
              </div>
              
            <div class="col-lg-9 col-xs-9 text-center" :style="cfstyle">
                <label class="handleeFont labelPreview paddingPreview" :style="cstyle">{{nombre}}</label>
            </div>
          </div>
      </div>
  </div>
  `
})