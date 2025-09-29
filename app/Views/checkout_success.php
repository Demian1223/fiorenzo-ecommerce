<section>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
<P>HIHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH</P>
</section>

<section class="max-w-3xl mx-auto py-16 px-6">
  <h1 class="text-4xl font-cinzel-deco text-center mb-6">Order Confirmed</h1>
  <div class="bg-white/80 backdrop-blur p-6 rounded-xl shadow">
    <p class="text-lg mb-4">
      Your order is now set. It will be delivered within <strong>three working days</strong>.
    </p>
    <p class="text-lg mb-4">
      Estimated delivery date: <strong><?= htmlspecialchars($confirmation['delivery_date']) ?></strong>
    </p>
    <p class="text-lg mb-4">
      Order ID: <strong>#<?= (int)$confirmation['order_id'] ?></strong>
    </p>
    <p class="text-lg mb-4">
      DELIVERY: <strong>Free<strong>
    </p>
    <p class="text-lg mb-4">
      THANK YOU FOR SHOPPING WITH FIORENZO. PLEASE ENSURE YOUR DETAILS ARE CORRECT.
  PAYMENT IS COLLECTED AT DELIVERY (CASH OR CARD). ONCE CONFIRMED, ORDERS ARE NON-REFUNDABLE.
    </p>
    
  </div>

  <div class="text-center mt-8">
    <a href="<?= BASE_URL ?>/shopwomen" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-800">
      Continue Shopping
    </a>
  </div>
</section>
