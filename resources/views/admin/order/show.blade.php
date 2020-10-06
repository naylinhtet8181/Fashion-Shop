<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div class="row">
    <div class="col-75">
      <div class="container">
          <div class="row">
            <div class="col-50">
                @foreach($customer as $item)
              <h3>Billing Address</h3>
              <label for="fname"><i class="fa fa-user"></i> Full Name</label>
              <input type="text" id="fname" name="name"  value="{{ $item->name }}" disabled>
              <label for="email"><i class="fa fa-envelope"></i> Email</label>
              <input type="text" id="email" name="email" value="{{ $item->email }}" disabled>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="adr" name="address" value="{{ $item->address }}" disabled>
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="city" name="city" value="{{ $item->city }}" disabled>
  
              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="state" name="state" value="{{ $item->state }}" disabled>
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="zip" name="zip" value="{{ $item->zip }}" disabled>
                </div>
              </div>
            </div>
  
            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="name_on_card" value="{{ $item->name_on_card }}" disabled>
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="credit_card_number" value="{{ $item->credit_card_number }}" disabled>
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="exp_month" value="{{ $item->exp_month }}" disabled>
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="exp_year" value="{{ $item->exp_year }}" disabled>
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" value="{{ $item->cvv }}" disabled>
                </div>
              </div>
            </div>
            @endforeach
          </div>
         <a href="/admin/order"><input type="submit" value="Back" class="btn" name="submit"></a>
      </div>
    </div>
    <div class="col-25">
      <div class="container">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{ $qty }}</b></span></h4>
        @foreach($items as $item)
        <p>{{$item->name}}×{{ $item->qty }}<span class="price">${{$item->total}}</span></p>
        @endforeach
        <hr>
        <p>Total <span class="price" style="color:black"><b>${{ $total_amount }}</b></span></p>
      </div>
    </div>
  </div>
  
  </body>
  </html>
  <style>
  body {
      font-family: Arial;
      font-size: 17px;
      padding: 8px;
    }
  
    * {
      box-sizing: border-box;
    }
  
    .row {
      display: -ms-flexbox; /* IE10 */
      display: flex;
      -ms-flex-wrap: wrap; /* IE10 */
      flex-wrap: wrap;
      margin: 0 -16px;
    }
  
    .col-25 {
      -ms-flex: 25%; /* IE10 */
      flex: 25%;
    }
  
    .col-50 {
      -ms-flex: 50%; /* IE10 */
      flex: 50%;
    }
  
    .col-75 {
      -ms-flex: 75%; /* IE10 */
      flex: 75%;
    }
  
    .col-25,
    .col-50,
    .col-75 {
      padding: 0 16px;
    }
  
    .container {
      background-color: #f2f2f2;
      padding: 5px 20px 15px 20px;
      border: 1px solid lightgrey;
      border-radius: 3px;
    }
  
    input[type=text] {
      width: 100%;
      margin-bottom: 20px;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }
  
    label {
      margin-bottom: 10px;
      display: block;
    }
  
    .icon-container {
      margin-bottom: 20px;
      padding: 7px 0;
      font-size: 24px;
    }
  
    .btn {
      background-color:#ff6666;
      color: white;
      padding: 12px;
      margin: 10px 0;
      border: none;
      width: 100%;
      border-radius: 3px;
      cursor: pointer;
      font-size: 17px;
    }
  
    .btn:hover {
      background-color:#ff6666;
    }
  
    a {
      color: #2196F3;
    }
  
    hr {
      border: 1px solid lightgrey;
    }
  
    span.price {
      float: right;
      color: grey;
    }
  
    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
      .row {
        flex-direction: column-reverse;
      }
      .col-25 {
        margin-bottom: 20px;
      }
    }
    </style>
  