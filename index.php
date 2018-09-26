<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Form Input Laporan Group HOTS</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="root">
    <div class="container" style="margin-top: 10px;margin-bottom: 30px">
      <div class="row">

          <div class="col-xs-12 col-sm-12 col-lg-12">
            <h3>Form Input Laporan Grup Hots</h3>
            <br>
            <form>
              <!-- {{this.arrAdmin}} -->
              <div class="form-group">
                <label for="ad">Admin :</label><br>
                <select class="form-control" id="ad" v-model="newReport.id_admin" @change="getGrup()">
                  <option value="" disabled selected>Pilih Nama Admin</option>
                  <option v-for="admin in this.arrAdmin" :value="admin.id">{{admin.nama}}</option>
                </select>
              </div>
              <!-- {{this.newReport.id_admin}} -->
              <!-- {{arrGrup}} -->
              <div class="form-group">
                <label for="gp">Nomor Grup - Surah - Reviewer - Fasil :</label><br>
                <select class="form-control" id="gp" v-model="newReport.id_grup">
                  <option value="" disabled selected>Pilih NomorGrup - Surah - Reviewer - Fasil</option>
                  <option v-for="grup in this.arrGrup" :value="grup.nomor_grup">{{grup.nomor_grup}}-{{grup.surah}}-{{grup.reviewer}}-{{grup.fasil}}</option>
                </select>
              </div>
              <!-- {{newReport.id_grup}} -->
              <div class="form-group">
                <label for="ha">Jumlah Hotser Aktif :</label>
                <input id="ha" type="text" class="form-control" v-model="newReport.memberAktiv">
              </div>
              <!-- {{newReport.memberAktiv}} -->
              <div class="form-group">
                <label for="hp">Jumlah Hotser Pasif :</label>
                <input id="hp" type="text" class="form-control" v-model="newReport.memberPasif">
              </div>
              <!-- {{newReport.memberPasif}} -->
              <div class="form-group">
                <label for="sg">Status Grup :</label><br>
                <select class="form-control" id="sg" v-model="newReport.statusGrup">
                  <option value="" disabled selected>Pilih Status Grup</option>
                  <option v-for="status in this.arrStatus" :value="status.val">{{status.tag}}</option>
                </select>
              </div>
              <!-- {{newReport.statusGrup}} -->
              <a class="btn btn-success" type="submit" name="action" @click="saveLaporan()">save</a>
              <a class="btn btn-info" href="/hots/index.html" type="submit">back to forward</a>
            </form>
          </div>

      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
  <!-- <script type="text/javascript" src="../sweetalert.js"></script>
  <script type="text/javascript" src="../axios.js"></script>
  <script type="text/javascript" src="../vue.js"></script> -->
  <script type="text/javascript" src="app.js"></script>
</body>
</html>
