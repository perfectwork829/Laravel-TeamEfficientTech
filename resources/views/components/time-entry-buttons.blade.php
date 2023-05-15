<!-- resources/views/components/time-entry-buttons.blade.php -->

@php
    $now = now();
    $user = auth()->user();
    $todayEntry = $user->timeEntries()->whereDate('start_time', $now->toDateString())->first();
    $isClockedIn = $todayEntry && !$todayEntry->end_time;
    $isOnLunch = $todayEntry && $todayEntry->lunch_start && !$todayEntry->lunch_end;
@endphp

@if (!$todayEntry)
    <form method="POST" action="{{ route('admin.time-entries.store') }}">
        @csrf
        <input type="hidden" name="start_time" value="{{ $now->format('m/d/Y H:i:s') }}">
        
        <button type="submit" class="btn btn-primary">
            Clock In
        </button>
    </form>
@endif

@if (!$isClockedIn && !$isOnLunch && $todayEntry && !$todayEntry->lunch_end)
    <form method="POST" action="{{ route('admin.time-entries.store') }}">
        @csrf
        <input type="hidden" name="start_time" value="{{ $now->format('m/d/Y H:i:s') }}">
        
        <button type="submit" class="btn btn-primary">
            Clock In
        </button>
    </form>
@endif

@if ($isClockedIn && !$isOnLunch && $todayEntry && !$todayEntry->lunch_end)
    <form method="POST" action="{{ route('admin.time-entries.update', $todayEntry) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="end_time" value="{{ $now->format('m/d/Y H:i:s') }}">
        <label for="notes">Clock Out Notes:</label>
        <textarea class="form-control" id="notes" name="notes"></textarea>
        <button type="submit" class="btn btn-primary">
            Clock Out
        </button>
    </form>
    <form method="POST" action="{{ route('admin.time-entries.update', $todayEntry) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="lunch_start" value="{{ $now->format('m/d/Y H:i:s') }}">
        <button type="submit" class="btn btn-primary">
            Go to Lunch
        </button>
    </form>
@endif

@if ($isOnLunch && $todayEntry && !$todayEntry->end_time)
    <form method="POST" action="{{ route('admin.time-entries.update', $todayEntry) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="lunch_end" value="{{ $now->format('m/d/Y H:i:s') }}">
        <button type="submit" class="btn btn-primary">
            Back From Lunch
        </button>
    </form>
@endif

@if ($isClockedIn && $todayEntry && $todayEntry->lunch_end)
    <form method="POST" action="{{ route('admin.time-entries.update', $todayEntry) }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="end_time" value="{{ $now->format('m/d/Y H:i:s') }}">
        <div class="form-group">
            <label for="notes">Clock Out Notes:</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Clock Out
        </button>
    </form>
@endif