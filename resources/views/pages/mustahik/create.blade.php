@extends('layouts.app', [
    'namePage' => 'Table Mustahik',
    'class' => 'sidebar-mini',
    'activePage' => 'table_mustahik',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Data Mustahik</h4>
          </div>
          <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('table_mustahik.store') }}">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="nama_mus">Nama Mustahik</label>
                            <input type="text" class="form-control" id="nama_mus" name="nama_mus" value="{{ old('nama_mus') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="ktp">Nomor KTP</label>
                            <input type="number" class="form-control" id="ktp" name="ktp" value="{{ old('ktp') }}" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jkl" id="jkl_laki" value="Laki-laki" {{ old('jkl') === 'Laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jkl_laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jkl" id="jkl_perempuan" value="Perempuan" {{ old('jkl') === 'Perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jkl_perempuan">Perempuan</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="jns_mus">Tipe Mustahik</label>
                            <input type="text" class="form-control" id="jns_mus" name="jns_mus" value="{{ old('jns_mus') }}" required>
                        </div> -->
                        <div class="form-group">
                            <label for="jns_mus">Tipe Mustahik</label>
                            <select class="form-control" id="jns_mus" name="jns_mus" required>
                                <option value="Fakir" {{ old('jns_mus') == 'Fakir' ? 'selected' : '' }}>Fakir</option>
                                <option value="Miskin" {{ old('jns_mus') == 'Miskin' ? 'selected' : '' }}>Miskin</option>
                                <option value="Amil" {{ old('jns_mus') == 'Amil' ? 'selected' : '' }}>Amil</option>
                                <option value="Muallaf" {{ old('jns_mus') == 'Muallaf' ? 'selected' : '' }}>Muallaf</option>
                                <option value="Riqab" {{ old('jns_mus') == 'Riqab' ? 'selected' : '' }}>Riqab</option>
                                <option value="Gharim" {{ old('jns_mus') == 'Gharim' ? 'selected' : '' }}>Gharim</option>
                                <option value="Fisabilillah" {{ old('jns_mus') == 'Fisabilillah' ? 'selected' : '' }}>Fisabilillah</option>
                                <option value="Ibnu Sabil" {{ old('jns_mus') == 'Ibnu Sabil' ? 'selected' : '' }}>Ibnu Sabil</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="tipe_mus">Subtipe Mustahik</label>
                            <select class="form-control" id="tipe_mus" name="tipe_mus" required>
                                <option value="Tipe 1" {{ old('tipe_mus') == 'Tipe 1' ? 'selected' : '' }}>Tipe 1</option>
                                <option value="Tipe 2" {{ old('tipe_mus') == 'Tipe 2' ? 'selected' : '' }}>Tipe 2</option>
                                <option value="Tipe 3" {{ old('tipe_mus') == 'Tipe 3' ? 'selected' : '' }}>Tipe 3</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="KTM">Kartu Tanda Mahasiswa</label>
                            <select class="form-control" id="KTM" name="KTM" required>
                                <option value="Ada" {{ old('KTM') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak" {{ old('KTM') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="spres">Surat Prestasi</label>
                            <select class="form-control" id="spres" name="spres" required>
                                <option value="Ada" {{ old('spres') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak" {{ old('spres') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Skel">Surat Kelurahan (Usaha)</label>
                            <select class="form-control" id="Skel" name="Skel" required>
                                <option value="Ada" {{ old('Skel') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak" {{ old('Skel') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Sktm">Surat Keterangan Tidak Mampu</label>
                            <select class="form-control" id="Sktm" name="Sktm" required>
                                <option value="Ada" {{ old('Sktm') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak" {{ old('Sktm') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sprem">Surat Pernyataan Kesanggupan</label>
                            <select class="form-control" id="sprem" name="sprem" required>
                                <option value="Ada" {{ old('sprem') == 'Ada' ? 'selected' : '' }}>Ada</option>
                                <option value="Tidak" {{ old('sprem') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="gaji">Gaji</label>
                            <input type="text" class="form-control" id="gaji" name="gaji" value="{{ old('gaji') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="status_2">Status (Keluarga) Mustahik </label>
                            <input type="text" class="form-control" id="status_2" name="status_2" value="{{ old('status_2') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div> -->

                        <div class="form-group">
                            <label for="link_maps">Link Maps</label>
                            <input type="text" class="form-control" id="link_maps" name="link_maps" value="{{ old('link_maps') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
        </div>
      </div>
      
        
      </div>
    </div>
  </div>
@endsection