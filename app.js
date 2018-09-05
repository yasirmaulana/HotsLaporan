var url = "http://localhost/HotsLaporan/api.php?action="
var app = new Vue({
  el: "#root",
  
  data: {
    arrAdmin: [],
    arrGrup: [],
    // arrFasil: [],
    // arrReviewer: [],
    newReport: {
      id_admin: '',
      id_grup: '',
      // id_fasil: '',
      // id_surah: ''
    }
  },

  mounted: function(){
    this.getAdmin()
    // this.getSurah()
  },

  methods: {
    getAdmin: function(){
      axios.get(url+"readAdmin")
       .then(function(response){
         app.arrAdmin = response.data.admins
        //  console.log('>>>>>>>>>>>>> admin')
       })
       .catch(function(error){
        //  console.log('============',error)
       })
    },

    getGrup: function(){
      let formData = new FormData()
      formData.append('id_admin', this.newReport.id_admin)

      axios.post(url+"readGrup", formData)
       .then(response => {
         this.arrGrup = response.data.groups
        //  console.log('>>>>>>>>>>>>>')
       })
       .catch(error => {
        //  console.log('============',error)
       })
    },

    // getFasil: function(){
    //   axios.get(url+"readFasil")
    //    .then(function(response){
    //      app.arrFasil = response.data.fasils
    //     //  console.log('>>>>>>>>>>>>>')
    //    })
    //    .catch(function(error){
    //     //  console.log('============',error)
    //    })
    // },


  }
})