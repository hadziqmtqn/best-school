<div class="tab-content p-0 m-0 border-0">
    <div class="tab-pane fade active show" id="navs-school-identity" role="tabpanel">
        <h5 class="mb-3 text-primary">Data Pokok</h5>

        <table class="table table-bordered w-100">
            @foreach($schoolIdentity['baseData'] as $key => $identity)
                <tr>
                    <th style="width: 35%">{{ $key }}</th>
                    <td style="width: 65%">{{ $identity }}</td>
                </tr>
            @endforeach
        </table>

        <h5 class="mb-3 text-primary">Alamat</h5>

        <table class="table table-bordered w-100">
            @foreach($schoolIdentity['address'] as $key => $identity)
                <tr>
                    <th style="width: 35%">{{ $key }}</th>
                    <td style="width: 65%">{{ $identity }}</td>
                </tr>
            @endforeach
        </table>

        <div class="alert alert-secondary" role="alert">
            {!! $schoolIdentity['profile'] !!}
        </div>
    </div>
</div>