<x-home.master :title="$title">

    <!-- Page Header -->
    <x-home.page-breadcrumb :title="$title"/>

    <!-- Main Content -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <img src="{{ $leadershipGreeting['avatar'] }}" alt="Kepala Sekolah" class="card-img-top">
                        <div class="card-body p-4 text-center">
                            <h4 class="fw-bold mb-1">{{ $leadershipGreeting['headMaster'] }}</h4>
                            <p class="text-muted mb-0">{{ $leadershipGreeting['personnelDepartment'] }} {{ $leadershipGreeting['institution'] }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4">
                        <div class="card-body p-4 p-md-5">
                            <div class="content lh-relaxed">
                                {!! $leadershipGreeting['message'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-home.master>
