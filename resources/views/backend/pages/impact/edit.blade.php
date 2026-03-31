<div id="myModalEdit{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-lg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modification de l'impact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row g-3 needs-validation" method="post"
                        action="{{ route('impacts.update', $item['id']) }}" novalidate>
                        @csrf
                        @method('PUT')
                        
                        <div class="col-md-6">
                            <label for="value{{ $item['id'] }}" class="form-label">Valeur</label>
                            <input type="text" name="value" value="{{ $item['value'] }}" class="form-control"
                                id="value{{ $item['id'] }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="label{{ $item['id'] }}" class="form-label">Libellé</label>
                            <input type="text" name="label" value="{{ $item['label'] }}" class="form-control"
                                id="label{{ $item['id'] }}" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="order{{ $item['id'] }}" class="form-label">Ordre</label>
                            <input type="number" name="order" value="{{ $item['order'] ?? '' }}" class="form-control" id="order{{ $item['id'] }}">
                        </div>

                        <div class="col-md-6">
                            <label for="is_active{{ $item['id'] }}" class="form-label">Statut</label>
                            <select name="is_active" class="form-control" id="is_active{{ $item['id'] }}">
                                <option value="1" {{ $item['is_active'] ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !$item['is_active'] ? 'selected' : '' }}>Inactif</option>
                            </select>
                        </div>

                        <div class="modal-footer mt-3">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary ">Modifier</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
