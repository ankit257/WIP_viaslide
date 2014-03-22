<div id="menu">
    <ul style="display: block;" class="left sf-js-enabled">
      <li id="dashboard"><a class="top" href="index.php?route=index/index">Dashboard</a></li>
	  <li id="catalog"><a class="top">Settings</a>
		<ul style="display: none; visibility: hidden;">
			<?php if($_SESSION['AdminUser']['user_type_id']==1) : ?>
			<li><a href="index.php?route=account/user">Admin Users</a></li>
			<?php endif; ?>
            <li><a href="index.php?route=account/siteuser">Site Users</a></li>
		</ul>
	  </li>
      <li id="catalog"><a class="top">Catalog</a>
        <ul style="display: none; visibility: hidden;">
          <li><a href="index.php?route=catalog/information">Informations</a></li>
          <li><a href="index.php?route=catalog/category">Categories</a></li>
          <li><a href="index.php?route=catalog/post">Posts</a></li>
          <li><a href="index.php?route=catalog/advertisment">Advertisments</a></li>
          <li><a href="index.php?route=catalog/faq">Faqs</a></li>
          <!--<li><a href="index.php?route=catalog/testimonial">Testimonials</a></li>
          <li><a href="index.php?route=catalog/current_opening">Current Openings</a></li>-->

          <!--<li><a href="index.php?route=catalog/category">Categories</a></li>
          <li><a href="index.php?route=catalog/post">Posts</a></li>
          
          
          <li><a href="index.php?route=catalog/product">Products</a></li>
          <li><a class="parent">Attributes</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=catalog/attribute">Attributes</a></li>
              <li><a href="index.php?route=catalog/attribute_group">Attribute Groups</a></li>
            </ul>
          </li>
          <li><a href="index.php?route=catalog/option">Options</a></li>
          <li><a href="index.php?route=catalog/manufacturer">Manufacturers</a></li>
          <li><a href="index.php?route=catalog/download">Downloads</a></li>
          <li><a href="index.php?route=catalog/review">Reviews</a></li>
          -->
        </ul>
      </li>
      
      
      <li id="extension"><a class="top">Extensions</a>
        <ul style="display: none; visibility: hidden;">
          <li><a href="index.php?route=extension/module">Modules</a></li>
          <!--
          <li><a href="index.php?route=extension/shipping">Shipping</a></li>
          <li><a href="index.php?route=extension/payment">Payments</a></li>
          <li><a href="index.php?route=extension/total">Order Totals</a></li>
          <li><a href="index.php?route=extension/feed">Product Feeds</a></li>
          -->
        </ul>
      </li>
      <!--
      <li id="sale"><a class="top">Sales</a>
        <ul style="display: none; visibility: hidden;">
          <li><a href="index.php?route=sale/order">Orders</a></li>
          <li><a href="index.php?route=sale/return">Returns</a></li>
          <li><a class="parent">Customers</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=sale/customer">Customers</a></li>
              <li><a href="index.php?route=sale/customer_group">Customer Groups</a></li>
              <li><a href="index.php?route=sale/customer_blacklist">IP Blacklist</a></li>
            </ul>
          </li>
          <li><a href="index.php?route=sale/affiliate">Affiliates</a></li>
          <li><a href="index.php?route=sale/coupon">Coupons</a></li>
          <li><a class="parent">Gift Vouchers</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=sale/voucher">Gift Vouchers</a></li>
              <li><a href="index.php?route=sale/voucher_theme">Voucher Themes</a></li>
            </ul>
          </li>
          <li><a href="index.php?route=sale/contact">Mail</a></li>
        </ul>
      </li>
      <li id="system"><a class="top">System</a>
        <ul style="display: none; visibility: hidden;">
          <li><a href="index.php?route=setting/store">Settings</a></li>
          <li><a class="parent">Design</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=design/layout">Layouts</a></li>
              <li><a href="index.php?route=design/banner">Banners</a></li>
            </ul>
          </li>
          <li><a class="parent">Users</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=user/user">Users</a></li>
              <li><a href="index.php?route=user/user_permission">User Groups</a></li>
            </ul>
          </li>
          <li><a class="parent">Localisation</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=localisation/language">Languages</a></li>
              <li><a href="index.php?route=localisation/currency">Currencies</a></li>
              <li><a href="index.php?route=localisation/stock_status">Stock Statuses</a></li>
              <li><a href="index.php?route=localisation/order_status">Order Statuses</a></li>
              <li><a class="parent">Returns</a>
                <ul style="display: none; visibility: hidden;">
                  <li><a href="index.php?route=localisation/return_status">Return Statuses</a></li>
                  <li><a href="index.php?route=localisation/return_action">Return Actions</a></li>
                  <li><a href="index.php?route=localisation/return_reason">Return Reasons</a></li>
                </ul>
              </li>
              <li><a href="index.php?route=localisation/country">Countries</a></li>
              <li><a href="index.php?route=localisation/zone">Zones</a></li>
              <li><a href="index.php?route=localisation/geo_zone">Geo Zones</a></li>
              <li><a class="parent">Taxes</a>
                <ul style="display: none; visibility: hidden;">
                  <li><a href="index.php?route=localisation/tax_class">Tax Classes</a></li>
                  <li><a href="index.php?route=localisation/tax_rate">Tax Rates</a></li>
                </ul>
              </li>
              <li><a href="index.php?route=localisation/length_class">Length Classes</a></li>
              <li><a href="index.php?route=localisation/weight_class">Weight Classes</a></li>
            </ul>
          </li>
          <li><a href="index.php?route=tool/error_log">Error Logs</a></li>
          <li><a href="index.php?route=tool/backup">Backup / Restore</a></li>
        </ul>
      </li>
      <li id="reports"><a class="top">Reports</a>
        <ul style="display: none; visibility: hidden;">
          <li><a class="parent">Sales</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=report/sale_order">Orders</a></li>
              <li><a href="index.php?route=report/sale_tax">Tax</a></li>
              <li><a href="index.php?route=report/sale_shipping">Shipping</a></li>
              <li><a href="index.php?route=report/sale_return">Returns</a></li>
              <li><a href="index.php?route=report/sale_coupon">Coupons</a></li>
            </ul>
          </li>
          <li><a class="parent">Products</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=report/product_viewed">Viewed</a></li>
              <li><a href="index.php?route=report/product_purchased">Purchased</a></li>
            </ul>
          </li>
          <li><a class="parent">Customers</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=report/customer_online">Customers Online</a></li>
              <li><a href="index.php?route=report/customer_order">Orders</a></li>
              <li><a href="index.php?route=report/customer_reward">Reward Points</a></li>
              <li><a href="index.php?route=report/customer_credit">Credit</a></li>
            </ul>
          </li>
          <li><a class="parent">Affiliates</a>
            <ul style="display: none; visibility: hidden;">
              <li><a href="index.php?route=report/affiliate_commission">Commission</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li id="help"><a class="top">Help</a>
        <ul style="display: none; visibility: hidden;">
          <li><a onclick="window.open('http://www.opencart.com');">Homepage</a></li>
          <li><a onclick="window.open('http://www.opencart.com/index.php?route=documentation/introduction');">Documentation</a></li>
          <li><a onclick="window.open('http://forum.opencart.com');">Support Forum</a></li>
        </ul>
      </li>
      -->
    </ul>
    <ul class="right sf-js-enabled" style="display: block;">
      <li id="store"><a class="top" onclick="window.open('<?php echo WEBROOT; ?>');">Store Front</a>
        <ul style="display: none; visibility: hidden;">
                  </ul>
      </li>
      <li id="store"><a href="index.php?route=index/index/logout" class="top">Logout</a></li>
    </ul>
    <script type="text/javascript"><!--
$(document).ready(function() {
	$('#menu > ul').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('#menu > ul').css('display', 'block');
});
 
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
	}
});
//></script> 
  </div>