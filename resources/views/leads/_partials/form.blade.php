@csrf

<div class="mb-3">
    <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $lead->email ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="phone">Phone:</label>
        <input type="tel" pattern="[6-9][0-9]{9}" maxlength="10"  name="phone" id="phone" class="form-control" value="{{ old('phone', $lead->phone ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="company">Company:</label>
        <input type="text" name="company" id="company" class="form-control" value="{{ old('company', $lead->company ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="budget">Budget:</label>
        <input type="number" name="budget" id="budget" class="form-control" value="{{ old('budget', $lead->budget ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="source">Source:</label>
        <input type="text" name="source" id="source" class="form-control" value="{{ old('source', $lead->source ?? '') }}">
    
</div>
<div class="mb-3">
    <label for="status">Status:</label>
    <select name="status" class="form-control" >
        <option value="">Select Status</option>
        
            <option value="new" @selected(old('status', $lead->status ?? '') == 'new'  )> New</option>
            <option value="contacted" @selected(old('status', $lead->status ?? '') == 'contacted'  )> Contacted</option>
            <option value="qualified" @selected(old('status', $lead->status ?? '') == 'qualified'  )> Qualified</option>
            <option value="proposal_sent" @selected(old('status', $lead->status ?? '') == 'proposal_sent'  )> Proposal Sent</option>
            <option value="negotiation" @selected(old('status', $lead->status ?? '') == 'negotiation'  )> Negotiation</option>
            <option value="won" @selected(old('status', $lead->status ?? '') == 'won'  )> Won</option>
            <option value="lost" @selected(old('status', $lead->status ?? '') == 'lost'  )> Lost</option>
    </select>
        <!-- <input type="text" name="status" id="status" class="form-control" value="{{ old('status', $lead->status ?? '') }}"> -->
    
</div>
<div class="mb-3">
    <label for="assign">Assign:</label>
    <select name="assigned_to" class="form-control" >
        <option value="">Select Memeber</option>
        @foreach($users as $user)
            <option value="{{ $user->id}}" @selected(old('assigned_to', $lead->assigned_to ?? '') == $user->id )>{{ $user->name}}</option>
        @endforeach
    </select>
        <!-- <input type="text" name="assign_to" id="assign" class="form-control" value="{{ old('assign', $lead->assign ?? '') }}"> -->
    
</div>
<div class="mb-3">
    <label for="message">Message:</label>
        <input type="text" name="message" id="message" class="form-control" value="{{ old('message', $lead->message ?? '') }}">
    
</div>
