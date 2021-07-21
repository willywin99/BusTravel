@extends('themes.travelagency.layout')

@section('content')
<section class="section section-variant-1 bg-default novi-background bg-cover">
    <div class="container container-wide">
      <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
        <div class="col-xl-8">
          <div class="parallax-text-wrap">
            <h3>Our Best Trips</h3><span class="parallax-text">Hot trips</span>
          </div>
          <hr class="divider divider-decorate">
        </div>
        <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" href="#">view all trips</a></div>
      </div>
      <div class="row row-50">
          @foreach ($trips as $trip)
            <a href="{{ url('trip/' . $trip->id) }}">
                <div class="col-md-6 col-xl-4">
                    <article class="event-default-wrap">
                    <div class="event-default">
                        {{-- <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-01-570x370.jpg') }}" alt="" width="570" height="370"/> --}}
                        <figure class="event-default-image"><img src="{{ asset('storage/' . $trip['bus_images']) }}" alt="" width="570" height="370"/>
                        </figure>
                        <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="{{ url('trip/' . $trip->id) }}">take a look</a></div>
                    </div>
                    <div class="event-default-inner">
                        <h5><a class="event-default-title" href="#">{{ $trip->from }} -> {{ $trip->to }}</a></h5><span class="heading-5"> from Rp. {{ number_format($trip->price) }}</span>
                    </div>
                    </article>
                </div>
            </a>
          @endforeach
        {{-- <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-02-570x370.jpg') }}" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="#">USA, Boston</a></h5><span class="heading-5">from $480</span>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-03-570x370.jpg') }}" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="#">Italy, Venice</a></h5><span class="heading-5">from $350</span>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-04-570x370.jpg') }}" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="#">Spain, Benidorm</a></h5><span class="heading-5">from $350</span>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-05-570x370.jpg') }}" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="#">Egypt,  Sharm El Sheikh</a></h5><span class="heading-5">from $520</span>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-xl-4">
          <article class="event-default-wrap">
            <div class="event-default">
              <figure class="event-default-image"><img src="{{ asset('themes/travelagency/assets/images/landing-private-airlines-06-570x370.jpg') }}" alt="" width="570" height="370"/>
              </figure>
              <div class="event-default-caption"><a class="button button-xs button-secondary button-nina" href="#">learn more</a></div>
            </div>
            <div class="event-default-inner">
              <h5><a class="event-default-title" href="#">UK, London</a></h5><span class="heading-5">from $600</span>
            </div>
          </article>
        </div> --}}
      </div>
    </div>
  </section>

@endsection
