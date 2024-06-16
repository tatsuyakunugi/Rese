<div class="reservation-edit">
    <div class="reservation-edit__card">
        <form class="edit-form" action="{{ route('reservations.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="edit-form__inner">
                <div class="edit-form__select">
                    <div class="edit__title">
                        <h2>予約内容変更</h2>
                    </div>
                    <dev class="alert">
                        @if(session('error'))
                        <div class="alert__danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </dev>
                    <div class="select__reservation-date">
                        <input type="date" wire:model.lazy="date" name="date">
                    </div>
                    <dev class="form__error">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </dev>
                    <div class="select__reservation-time">
                        <select class="select__time" wire:model.lazy="time" name="time" id="time">
                            <option value="">選択してください</option>
                            @for($i = 10; $i <= 21; $i++)
                                @for($j = 0; $j <= 5; $j++)
                                <option value="{{ $i }}:{{ $j }}0">{{ $i }}:{{ $j }}0</option>
                                @endfor
                            @endfor
                            <option value="22:00">22:00</option>
                        </select>
                    </div>
                    <div class="form__error">
                        @error('time')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="select__number_of_people">
                        <select class="select__number_of_people" wire:model.lazy="number_of_people" name="number_of_people" id="number_of_people">
                            <option value="">選択してください</option>
                            @for($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}人">{{ $i }}人</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form__error">
                        @error('number_of_people')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="edit-form__confirm">
                    <div class= "confirm__group">
                        <div class="confirm-title">
                            <span>Shop</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $reservation->shop->shop_name }}</p>
                        </div>
                    </div>
                    <div class= "confirm__group">
                        <div class="confirm-title">
                            <span>Date</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $date }}</p>
                        </div>
                    </div>
                    <div class = "confirm__group">
                        <div class="confirm-title">
                            <span>Time</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $time }}</p>
                        </div>
                    </div>
                    <div class = "confirm__group">
                        <div class="confirm-title">
                            <span>Number</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $number_of_people }}</p>
                        </div>
                    </div>
                </div>
                <div class="edit-form__button">
                    <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
                    <button class="edit-form__button-submit" type="submit">予約内容を変更する</button>
                </div>
            </div>    
        </form>
    </div>
</div>
