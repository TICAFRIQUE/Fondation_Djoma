<div id="myModalEdit{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-lg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modification de la section À propos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" method="post"
                        action="{{ route('apropos.update', $item['id']) }}" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-12">
                            <label for="title{{ $item['id'] }}" class="form-label">Titre</label>
                            <input type="text" name="title" value="{{ $item['title'] }}" class="form-control"
                                id="title{{ $item['id'] }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="description{{ $item['id'] }}" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="description{{ $item['id'] }}" rows="4" required>{{ $item['description'] }}</textarea>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="stat_1_value{{ $item['id'] }}" class="form-label">Stat 1 - Valeur</label>
                            <input type="text" name="stat_1_value" value="{{ $item['stat_1_value'] ?? '' }}" class="form-control" id="stat_1_value{{ $item['id'] }}" 
                                placeholder="+500">
                        </div>

                        <div class="col-md-6">
                            <label for="stat_1_label{{ $item['id'] }}" class="form-label">Stat 1 - Libellé</label>
                            <input type="text" name="stat_1_label" value="{{ $item['stat_1_label'] ?? '' }}" class="form-control" id="stat_1_label{{ $item['id'] }}" 
                                placeholder="élèves">
                        </div>

                        <div class="col-md-6">
                            <label for="stat_2_value{{ $item['id'] }}" class="form-label">Stat 2 - Valeur</label>
                            <input type="text" name="stat_2_value" value="{{ $item['stat_2_value'] ?? '' }}" class="form-control" id="stat_2_value{{ $item['id'] }}">
                        </div>

                        <div class="col-md-6">
                            <label for="stat_2_label{{ $item['id'] }}" class="form-label">Stat 2 - Libellé</label>
                            <input type="text" name="stat_2_label" value="{{ $item['stat_2_label'] ?? '' }}" class="form-control" id="stat_2_label{{ $item['id'] }}">
                        </div>

                        <div class="col-md-12">
                            <label for="image{{ $item['id'] }}" class="form-label">Image</label>
                            @if($item['image'])
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['title'] }}" style="max-width: 100px; height: auto;">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control" id="image{{ $item['id'] }}" accept="image/*">
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
