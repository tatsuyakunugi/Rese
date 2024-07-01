<div class="modal__content">
    <div class="modal__content--inner">
        <div class="modal__button">
            <button class="modal__button-submit" wire:click="openModal()" type="button">
                レビューを書く
            </button>
        </div>
        @if($showModal)
        <div class="review__content">
            <div class="review__content--inner">
                <div class="close__button">
                    <button class="close__button-submit" wire:click="closeModal()" type="button">
                        閉じる
                    </button>
                </div>
                <div class="review__content--heading">
                    <div class="message">
                        <p>この度はご来店ありがとうございました。</p> 
                        <p>よろしければアンケートにご協力ください。</p>
                    </div>
                </div>
                <div class="review-card">
                    <form class="review-form" action="{{ route('reviews.store') }}" method="post">
                        @csrf
                        <div class="shop-name">
                            <p>{{ $reservation->shop->shop_name }}</p>
                        </div>
                        <div class="form__group">
                            <div class="select__rating">
                                <input id="star5" type="radio" name="rating" value="5">
                                <label for="star5">★5</label>
                                <input id="star4" type="radio" name="rating" value="4">
                                <label for="star4">★4</label>
                                <input id="star3" type="radio" name="rating" value="3">
                                <label for="star3">★3</label>
                                <input id="star2" type="radio" name="rating" value="2">
                                <label for="star2">★2</label>
                                <input id="star1" type="radio" name="rating" value="1">
                                <label for="star1">★1</label>
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="input__comment">
                                <textarea name="comment"></textarea>
                            </div>
                        </div>
                        <div class="review-form__button">
                            <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                            <button class="review-form__button-submit" type="submit">レビューを投稿する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif        
    </div>
</div>
