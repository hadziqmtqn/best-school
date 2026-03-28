<div class="tab-content p-0 m-0 border-0">
    <div class="tab-pane fade" id="navs-extracurricular" role="tabpanel">
        <table class="table table-bordered w-100">
            <thead>
            <tr>
                <th>Ekstrakurikuler</th>
                <th>Galeri</th>
            </tr>
            </thead>
            <tbody>
            @foreach($extracurriculars as $key => $extracurricular)
                <tr>
                    <td>
                        <p class="mb-1 fw-bold">{{ $extracurricular['name'] }}</p>
                        <p class="mb-0">{{ $extracurricular['description'] }}</p>
                    </td>
                    <td>
                        @if(count($extracurricular['galleries']) > 0)
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#extra-{{ $key }}">Lihat</button>

                            <x-component.modal1 id-modal="extra-{{ $key }}" title="Galeri Ekstrakurikuler">
                                <div class="row">
                                    @foreach($extracurricular['galleries'] as $gallery)
                                        <div class="col-md-6">
                                            <a href="{{ $gallery }}" target="_blank">
                                                <img src="{{ $gallery }}" alt="Galery" class="w-100">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </x-component.modal1>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>