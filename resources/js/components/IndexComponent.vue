<template>
    <div class="container">
        <div class="row form mt-5 pt-3">
            <div class="col-12">
                <h1>Form Pegawai <span v-if="modeEdit" class="badge badge-info pr-3">Mode:update</span><Button v-if="modeEdit" class="btn btn-danger btn-sm" @click.prevent="clear()">Exit</Button> <span v-if="modeDetail" class="badge badge-warning pr-3">Mode:detail</span><Button v-if="modeDetail" class="btn btn-danger btn-sm" @click.prevent="clear()">Exit</Button></h1>
            </div>
            <div class="col-12">
                <form @submit.prevent="submitForm">
                    <div class="form-group col-12">
                        <label for="inputNama">Nama</label>
                        <input v-model="name" required type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group col-12">
                        <label for="alamat">Alamat</label>
                        <textarea v-model="alamat" required class="form-control" id="alamat" rows="3" placeholder="1234 Main St"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="nomor_ktp">Nomor KTP</label>
                        <i v-if="modeEdit">Tidak diizinkan untuk diperbarui!</i>
                        <input :disabled="modeEdit" v-model="nomor_ktp" required type="number" class="form-control" id="nomor_ktp">
                    </div>
                    <div class="form-group col-12">
                        <label  class="pr-3">Pendidikan</label>
                        <button :disabled="modeDetail" class="btn btn-primary btn-sm" @click.prevent="tambahPendidikan()">Tambah pendidikan</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Sekolah/Universitas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Tahun Masuk</th>
                                    <th scope="col">Tahun Lulus</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr v-for="(row, index) in pendidikan" :key="index">
                                    <th><input v-model="pendidikan[index].nama_sekolah" required type="text" class="form-control" ></th>
                                    <td><input v-model="pendidikan[index].jurusan" required type="text" class="form-control" ></td>
                                    <td><input v-model="pendidikan[index].tahun_masuk" required type="number" class="form-control" ></td>
                                    <td><input v-model="pendidikan[index].tahun_lulus" required type="number" class="form-control" ></td>
                                    <td><Button :disabled="modeDetail" class="btn btn-danger btn-sm" @click.prevent="hapus('pendidikan',index)">Hapus</Button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-12">
                        <label  class="pr-3">Pengalaman Kerja</label>
                        <button :disabled="modeDetail" class="btn btn-primary btn-sm" @click.prevent="tambahExperience()   ">Tambah pengalaman kerja</button>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Jabatan/Posisi</th>
                                    <th scope="col">Tahun</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(row, index) in experience" :key="index">
                                    <th><input v-model="experience[index].perusahaan" required type="text" class="form-control" ></th>
                                    <td><input v-model="experience[index].jabatan" required type="text" class="form-control" ></td>
                                    <td><input v-model="experience[index].tahun" required type="number" class="form-control" ></td>
                                    <td><input v-model="experience[index].keterangan" required type="text" class="form-control" ></td>
                                    <td><Button :disabled="modeDetail" class="btn btn-danger btn-sm" @click.prevent="hapus('experience',index)">Hapus</Button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 d-flex justify-content-end ">
                        <button :disabled="modeDetail" class="px-5 btn btn-success btn-lg">Submit</button>
                    </div>
                </form>
            </div>               
        </div>
        <hr>
        <div class="col-12 mt-5 mb-4">
            <h1>Data Pegawai</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor KTP</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in tabelKaryawan" :key="index">
                            <th>{{index}}</th>
                            <td>{{row.name}}</td>
                            <td>{{row.nomor_ktp}}</td>
                            <td><Button :disabled="modeDetail" class="btn btn-warning btn-sm" @click.prevent="switchMode('detail',index)">Detail</Button>
                            <Button :disabled="modeDetail" class="btn btn-danger btn-sm" @click.prevent="deleteKaryawan(row.nomor_ktp,index)">Hapus</Button>
                            <Button :disabled="modeDetail" class="btn btn-info btn-sm" @click.prevent="switchMode('edit',index)">Edit</Button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('/karyawan').then(response=>this.tabelKaryawan=response.data)
        },
        data() {
            return {
                name:'',
                alamat:'',
                nomor_ktp:'',
                pendidikan:[],
                experience:[],
                tabelKaryawan:[],
                modeEdit:false,
                editIndex:0,
                modeDetail:false,
                
            }
        },
        methods: {
            tambahPendidikan: function(){
                this.pendidikan.push({
                    id:'',
                    nama_sekolah:'',
                    jurusan:'',
                    tahun_masuk:'',
                    tahun_lulus:'',
                    nomor_ktp: this.nomor_ktp,
                })
            },
            tambahExperience: function(){
                this.experience.push({
                    id:'',
                    perusahaan:'',
                    jabatan:'',
                    tahun:'',
                    keterangan:'',
                    nomor_ktp: this.nomor_ktp,
                })
            },
            submitForm: function(){
                let karyawan={
                    "name":this.name,
                    "alamat":this.alamat,
                    "nomor_ktp": this.nomor_ktp
                }
                let pendidikan = {
                    "pendidikan":this.pendidikan
                }
                let experience = {
                    "experience":this.experience
                }
                if(this.modeEdit===false){
                    
                    axios.post('/karyawan', karyawan).then(
                        (response)=>{
                            if(response.status==201 && this.pendidikan.length != 0){
                                axios.post('/pendidikan', pendidikan).then((response)=>console.log())
                            }
                            if(response.status==201 && this.experience != 0){
                                axios.post('/experience', experience).then((response)=>console.log())
                            }
                            this.tabelKaryawan.push(response.data)
                            this.clear()
                        }
                    )
                } else {
                    axios.patch(`/karyawan/${this.nomor_ktp}`, karyawan).then(
                        (response)=>{
                            if(response.status==200 && this.pendidikan.length != 0){
                                axios.patch(`/pendidikan/${this.editIndex}`, pendidikan).then((response)=>console.log())
                            }
                            if(response.status==200 && this.experience != 0){
                                axios.patch(`/experience/${this.editIndex}`, experience).then((response)=>console.log())
                            }
                            this.tabelKaryawan.splice(this.editIndex,1)
                            this.tabelKaryawan.push(response.data)
                            this.clear()
                        }
                    )
                }
                
            },
            hapus: function(type, index){
                let obj = type === 'pendidikan'? this.pendidikan: this.experience
                if(this.modeEdit && type === 'pendidikan'){
                    axios.delete(`/pendidikan/${this.pendidikan[index].id}`).then(
                        ()=>obj.splice(index, 1)
                    )
                } else if(this.modeEdit && type ==='experience') {
                    axios.delete(`/experience/${this.experience[index].id}`).then(
                        ()=>obj.splice(index, 1)
                    )
                }
            },
            deleteKaryawan: function(nomor_ktp, index){
                axios.delete(`/karyawan/${nomor_ktp}`).then((response)=>{
                    if(response.status==200){
                        this.tabelKaryawan.splice(index,1);
                    }
                })
            },
            switchMode: function(mode,index){
                if(mode==="edit"){
                    this.modeEdit=true
                    this.editIndex=index
                } else {
                    this.modeDetail=true
                }
                this.name=this.tabelKaryawan[index].name
                this.alamat=this.tabelKaryawan[index].alamat
                this.nomor_ktp=this.tabelKaryawan[index].nomor_ktp
                axios.get(`/karyawan/${this.nomor_ktp}`).then(response=>{
                    this.pendidikan=response.data.pendidikan;
                    this.experience=response.data.experience;
                })
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
            clear: function(){
                this.name=''
                this.alamat=''
                this.nomor_ktp=''
                this.pendidikan=[]
                this.experience=[]
                this.modeEdit=false;
                this.modeDetail=false;
            },
            
        }
    }
</script>

