@csrf
<div class="mb-3">
    <label for="name">
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $model->name ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="email">
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $model->email ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="phone">
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $model->phone ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="company">
        <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $model->company ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="budget">
        <input type="text" name="budget" id="budget" class="form-control" value="{{ old('budget', $model->budget ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="source">
        <input type="text" name="source" id="source" class="form-control" value="{{ old('source', $model->source ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="status">
        <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $model->status ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="assign">
        <input type="text" name="assign" id="assign" class="form-control" value="{{ old('assign', $model->assign ?? '') }}">
    
</div>
