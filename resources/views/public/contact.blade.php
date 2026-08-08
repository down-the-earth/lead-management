<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div  class="container-fluid">
@if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
@if(session('error'))
        <div class="alert-danger">
            {{session('error')}}
        </div>
    @endif
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <form method="POST" action="{{ route('lead.submit') }}">

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
            <label for="message">Message:</label>
                <input type="text" name="message" id="message" class="form-control" value="{{ old('message', $lead->message ?? '') }}">
            
        </div>

        <button class="btn btn-primary">

            Submit

        </button>

    </form>
</div>

</body>
</html>

