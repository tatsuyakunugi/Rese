@if(Auth::check())
<div class="reservation-detail">
    <div class="reservation-card">
        <form class="reservation-form" action="/done" method="post">
            <div class="reservsation-form__inner">
                <div class="reservation-form__select">
                    <div class="reservation__title">
                        <h2>予約</h2>
                    </div>
                    <div class="select__reservation-date">
                        <input type="date" wire:model.lazy="date" name="date">
                    </div>
                    <div class="select__reservation-time">
                        <select class="select__time" wire:model.lazy="time" name="time" id="time">
                            <option value="">選択してください</option>
                            @for($i = 10; $i <= 21; $i++)
                                @for($j = 0; $j <= 5; $j++)
                                <option value="{{ $i }}:{{ $j }}0">{{ $i }}:{{ $j }}0</option>
                                @endfor
                            @endfor
                        </select>
                    </div>
                    <div class="select__number_of_people">
                        <select class="select__number_of_people" wire:model.lazy="number_of_people" name="number_of_people" id="number_of_people">
                            <option value="">選択してください</option>
                            @for($i = 1; $i <= 30; $i++)
                            <option value="{{ $i }}">{{ $i }}人</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="reservation-form__confirm">
                    <div class="shop-name">
                        <h2>{{ $shop->shop_name }}</h2>
                    </div>
                    <div class= "confirm__gorup">
                        <div class="confirm-title">
                            <span>Date</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $date }}</p>
                        </div>
                    </div>
                    <div class = "confirm__gorup">
                        <div class="confirm-title">
                            <span>Time</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $time }}</p>
                        </div>
                    </div>
                    <div class = "confirm__gorup">
                        <div class="confirm-title">
                            <span>Number</span>
                        </div>
                        <div class="select__result">
                            <p>{{ $number_of_people }}</p>
                        </div>
                    </div>
                </div>
                <div class="reservation-form__button">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <button class="reservation-form__button-submit" type="submit">予約する</button>
                </div>
            </div>    
        </form>
    </div>
</div>
@endif