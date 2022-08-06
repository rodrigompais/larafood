
@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $tenant->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Logo:</label>
    <input type="file" name="logo" class="form-control">
</div>
<div class="form-group">
    <label>* E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="Nome:" value="{{ $tenant->email ?? old('email') }}">
</div>
<div class="form-group">
    <label>* CNPJ:</label>
    <input type="number" name="cnpj" class="form-control" placeholder="Nome:" value="{{ $tenant->cnpj ?? old('cnpj') }}">
</div>
<div class="form-group">
    <label>* Situação:</label>
    <select name="active" class="form-control">
        <option value="Y" @if (isset($tenant) && $tenant->active == 'Y') selected @endif>Ativo</option>
        <option value="N" @if (isset($tenant) && $tenant->active == 'N') selected @endif>Inativo</option>
    </select>
</div>
<hr>
<h3>Detalhes da Assinatura</h3>
<div class="form-group">
    <label>Data da Assinatura (Inicio):</label>
    <input type="date" name="subscription" class="form-control" placeholder="Nome:" value="{{ $tenant->subscription ?? old('subscription') }}">
</div>
<div class="form-group">
    <label>Expita (Final):</label>
    <input type="date" name="expires_at" class="form-control" placeholder="Nome:" value="{{ $tenant->expires_at ?? old('expires_at') }}">
</div>
<div class="form-group">
    <label>Indentificador:</label>
    <input type="text" name="subscription_id" class="form-control" placeholder="Nome:" value="{{ $tenant->subscription_id ?? old('subscription_id') }}">
</div>
<div class="form-group">
    <label>* Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control">
        <option value="1" @if (isset($tenant) && $tenant->subscription_active == 'Y') selected @endif>Ativo</option>
        <option value="0" @if (isset($tenant) && $tenant->subscription_active == 'N') selected @endif>Inativo</option>
    </select>
</div>
<div class="form-group">
    <label>* Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control">
        <option value="1" @if (isset($tenant) && $tenant->subscription_suspended == 'Y') selected @endif>Ativo</option>
        <option value="0" @if (isset($tenant) && $tenant->subscription_suspended == 'N') selected @endif>Inativo</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
