<div>
    {{-- Be like water. --}}

    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Lettuce Treatments and Preventions</h5>
            </div>
            <div class="card-body">
                <div class="accordion" id="accordionExample">
                    {{-- @dd($recommendations) --}}
                    @foreach ($recommendations as $r)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#{{ $r->disease_name }}" aria-expanded="false"
                                    aria-controls="{{ $r->disease_name }}">
                                    @if ($r->disease_name == 'bacterial')
                                        <strong>Bacterial</strong>
                                    @elseif ($r->disease_name == 'Downy_mildew_on_lettuce')
                                        <strong>Downy Mildew</strong>
                                    @elseif ($r->disease_name == 'Viral')
                                        <strong>Viral</strong>
                                    @elseif ($r->disease_name == 'Powdery_mildew_on_lettuce')
                                        <strong>Powdery Mildew</strong>
                                    @elseif ($r->disease_name == 'Wilt_and_leaf_blight_on_lettuce')
                                        <strong>Wilt and Leaf Blight</strong>
                                    @elseif ($r->disease_name == 'healthy')
                                        <strong>Healthy</strong>
                                    @elseif ($r->disease_name == 'Septoria_Blight_on_lettuce')
                                        <strong>Septorial Blight</strong>
                                    @endif
                                </button>
                            </h2>
                            <div id="{{ $r->disease_name }}" class="accordion-collapse collapse"
                                data-bs-parent="#{{ $r->disease_name }}">
                                <div class="accordion-body">
                                    @if ($r->disease_name == 'bacterial')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='BacterialTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='BacterialPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @elseif($r->disease_name == 'Downy_mildew_on_lettuce')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='DownyMildewTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='DownyMildewPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @elseif($r->disease_name == 'Viral')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='ViralTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='ViralPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @elseif($r->disease_name == 'Powdery_mildew_on_lettuce')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='PowderyMildewTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='PowderyMildewPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @elseif($r->disease_name == 'Wilt_and_leaf_blight_on_lettuce')
                                        <form wire:submit="update{({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='WiltAndLeafBlightTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='WiltAndLeafBlightPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @elseif($r->disease_name == 'healthy')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='HealthyTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='HealthyPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                     @elseif($r->disease_name == 'Septoria_Blight_on_lettuce')
                                        <form wire:submit="update({{ $r->id }})">
                                            <div class="input-group">
                                                <span class="input-group-text">Treatment</span>
                                                <textarea class="form-control" aria-label="Treatment" wire:model='SeptoriaBlightTreatment'></textarea>
                                            </div>
                                            <div class="input-group mt-1">
                                                <span class="input-group-text">Prevention</span>
                                                <textarea class="form-control" aria-label="With textarea" wire:model='SeptoriaBlightPrevention'></textarea>
                                            </div>
                                            <hr>
                                            <div class="mt-1">

                                                <button class="btn btn-primary btn-sm">Update</button>
                                            </div>
                                        </form>
                                    @endif







                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>



</div>
