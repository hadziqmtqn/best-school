@use(Illuminate\Support\Str)
@use(App\Enums\AchievementLevel)

<div class="tab-content p-0 m-0 border-0">
    <div class="tab-pane fade" id="navs-achievement" role="tabpanel">
        <div id="achievement-table-container">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap w-100">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tahun</th>
                        <th>Tingkat</th>
                        <th>Deskripsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($achievements as $achievement)
                        <tr>
                            <td>{{ $achievement->name }}</td>
                            <td>{{ $achievement->year }}</td>
                            <td><span class="badge bg-label-{{ AchievementLevel::tryFrom($achievement->achievement_level)?->getColor() ?? 'secondary' }}">{{ $achievement->achievement_level }}</span></td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <div class="me-4">{{ Str::limit($achievement->description, 70) }}</div>
                                    <div data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip-primary" title="{{ $achievement->description }}"><i class="bi bi-info-circle"></i></div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="ajax-pagination">
                {{ $achievements->appends(request()->except('achievement_page'))->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ asset('js/home/school-identity/achievement.js') }}"></script>
@endpush