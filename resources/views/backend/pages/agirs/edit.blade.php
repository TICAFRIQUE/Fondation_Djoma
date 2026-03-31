<div id="myModalEdit{{ $item['id'] }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
     style="display: none;">
     <div class="modal-lg">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modification de l'action</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">

                    <form class="row g-3 needs-validation" method="post"
                        action="{{ route('agirs.update', $item['id']) }}" novalidate>
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
                            <textarea name="description" class="form-control" id="description{{ $item['id'] }}" rows="3" required>{{ $item['description'] }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="type{{ $item['id'] }}" class="form-label">Type</label>
                            <select name="type" class="form-control" id="type{{ $item['id'] }}" required>
                                <option value="donation" {{ $item['type'] == 'donation' ? 'selected' : '' }}>Don</option>
                                <option value="sponsorship" {{ $item['type'] == 'sponsorship' ? 'selected' : '' }}>Parrainage</option>
                                <option value="volunteer" {{ $item['type'] == 'volunteer' ? 'selected' : '' }}>Bénévole</option>
                                <option value="partner" {{ $item['type'] == 'partner' ? 'selected' : '' }}>Partenaire</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="icon{{ $item['id'] }}" class="form-label">Icône (Emoji ou HTML)</label>
                            <input type="text" name="icon" value="{{ $item['icon'] ?? '' }}" class="form-control" id="icon{{ $item['id'] }}" placeholder="💰 ou &lt;i class='bi bi-heart'&gt;">
                        </div>

                        <div class="col-md-6">
                            <label for="color{{ $item['id'] }}" class="form-label">Couleur de fond</label>
                            <input type="color" name="color" value="{{ $item['color'] ?? '#FFF3E0' }}" class="form-control" id="color{{ $item['id'] }}">
                        </div>

                        <div class="col-md-6">
                            <label for="order{{ $item['id'] }}" class="form-label">Ordre</label>
                            <input type="number" name="order" value="{{ $item['order'] ?? 0 }}" class="form-control" id="order{{ $item['id'] }}">
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
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->