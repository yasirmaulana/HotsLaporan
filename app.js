// var url = "http://hots.kauny.com/hotsadmin/api.php?action="
var url = "http://localhost/hots/hotsadmin/api.php?action="

var app = new Vue({
  el: "#root",

  data: {
    arrAdmin: [],
    arrGrup: [],
    newReport: {
      id_admin: '',
      id_grup: '',
      memberAktiv: '',
      memberPasif: '',
      statusGrup: ''
    },
    arrStatus: [
      {val: 'J', tag: 'Jalan'},
      {val: 'P', tag: 'Pasif'},
      {val: 'M', tag: 'Merger'}
    ]
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
        //  console.log('>>>>>>>>>>>>> admin',app.arrAdmin)
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

    validasiForm: function () {
      if (this.newReport.id_admin === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Admin wajib diisi'
        })
        return false
      } else if (this.newReport.id_grup === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Grup wajib diisi'
        })
        return false
      } else if (this.newReport.memberAktiv === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Member Aktif wajib diisi'
        })
        return false
      } else if (this.newReport.memberPasif === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Member Pasif wajib diisi'
        })
        return false
      } else if (this.newReport.statusGrup === '') {
        swal({
          icon: 'error',
          title: 'Oops',
          text: 'Status Grup wajib diisi'
        })
        return false
      } else {
        return true
      }
    },

    toFormdata: function(obj){
      var form_data = new FormData()
      for(var key in obj){
        form_data.append(key, obj[key])
      }
      return form_data;
    },

    saveLaporan: function(){
      let cek = this.validasiForm()
      if(cek){
        var formData = this.toFormdata(this.newReport)
        axios.post(url+"simpanLaporan", formData)
          .then(function(response){
            swal('Laporan Grup Hots', 'Laporan berhasil diinput', 'success')
            // console.log(response)
          })
          .catch(function(error){
            swall({
              icon: 'error',
              title: 'Oops...',
              text: 'input failed...'
            })
          })
      }
    }


  }

})
