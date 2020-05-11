<script type="text/javascript">
  jQuery(document).ready(function($){
    function scrollToSection(event){
      event.preventDefault();
      var $section = $($(this).attr('href'));
      $('html,body').animate({scrollTop: (target.offset().top - 56)
        }, 1000, "easeInOutExpo");
    }
  $('[data-scroll]').on('click',scrollToSection);
  }(jQuery)
  );
</script>
<style type="text/css">
  li,p{
    font-size: large;
  }
  .btn{
    font-size: large;
  }
</style>
<?php
	include("inclds/head.php");
?>

<div class="mt-5 mb-5">
	<div class="text-center mb-5">
		<h1 class="text-primary">About GST</h1>
		<h4 class="text-secondary">Goods and Service Tax</h4>
		<hr class="mb-5 mt-3">
	</div>
	<div class="container">
		<div class="card-deck mb-5">
		<div class="card rounded shadow-sm text-center bg-info text-white" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">GST Basics</h5>
		    <p class="card-text">understand the concept of GST and its impact on businesses</p>
		    <button class="btn btn-light collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
          Read more
        </button>
		  </div>
		</div>
		<div class="card rounded shadow-sm text-center bg-warning text-white" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">GST Glossary</h5>
		    <p class="card-text">Know the basis GST terms and their definations</p>
		    <button class="btn btn-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
          Read More
        </button> 
		  </div>
		</div>
		<div class="card rounded shadow-sm text-center bg-danger text-white" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">GST Registration</h5>
		    <p class="card-text">Learn about elligibility criteria and the process involved in GST Registration</p>
		    <button class="btn btn-light collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Read More
        </button>
		  </div>
		</div>
		</div>

		<div id="accordion">
  <div class="card">
    <div class="card-header rounded bg-white" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        GST Basics
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body text-dark text-justify">
      	<p>GST is a single tax that has subsumed several indirect taxes that were previously levied on the sale of goods and services. It is applicable to the manufacture, sale, and consumption of all goods and services in India.</p>
      	<p>Goods and Services Tax (GST) is an indirect tax (or consumption tax) used in our Contry on the supply of goods and services. It is a comprehensive, multistage, destination based tax: comprehensive because it has subsumed almost all the indirect taxes except a few state taxes. Multi-staged as it is, the GST is imposed at every step in the production process, but is meant to be refunded to all parties in the various stages of production other than the final consumer and as a destination based tax, it is collected from point of consumption and not point of origin like previous taxes.</p>
      	<p>Goods and services are divided into five different tax slabs for collection of tax - 0%, 5%, 12%, 18% and 28%. However, petroleum products, alcoholic drinks, and electricity are not taxed under GST and instead are taxed separately by the individual state governments, as per the previous tax system. There is a special rate of 0.25% on rough precious and semi-precious stones and 3% on gold. In addition a cess of 22% or other rates on top of 28% GST applies on few items like aerated drinks, luxury cars and tobacco products. Pre-GST, the statutory tax rate for most goods was about 26.5%, Post-GST, most goods are expected to be in the 18% tax range.</p>
      	<p>The tax came into effect from 1 July 2017 through the implementation of the One Hundred and First Amendment of the Constitution of India by the Indian government. The GST replaced existing multiple taxes levied by the central and state governments.</p>
      	<p>The tax rates, rules and regulations are governed by the GST Council which consists of the finance ministers of the central government and all the states. The GST is meant to replace a slew of indirect taxes with a federated tax and is therefore expected to reshape the country's 2.4 trillion dollar economy, but it's implementation has received criticism. Positive outcomes of the GST includes the travel time in interstate movement, which dropped by 20%, because of disbanding of interstate check posts.</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-white rounded" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          GST Glossary
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body text-justify">

       <p> GST, the new genre taxation module is imbibed with numerous new terms and nomenclatures, which you should be aware about.<br>

The article aims to apprise you of all the GST terms, their broad definitions and their applicability.
<br>
Following are the major ones, some of which you may have heard until now or may encounter soon:
<ul>
<li>GST</li>
<li>GSTIN</li>
<li>CGST, SGST and IGST</li>
<li>Reverse Charge</li>
<li>Mixed Supply</li>
<li>Composite Supply</li>
<li>Continuous Supply</li>
<li>ITC</li>
<li>GSTR</li>
<li>GST Compliance Rating</li>
</ul>
</p>

<section id="gst">
<p><strong>GST</strong></p>
<p>
Goods and Services Tax, commonly known as GST, is a single, indirect, multi-stage, destination based consumption tax, which will replace almost all the existing Central and State taxes, including but not limited to CENVAT, Octroi, Sales Tax and Excise Duty etc.  GST has replaced all existing direct and indirect, Central and State taxes, from 1st July, 2017.
</p>
</section>
<p><strong>GSTIN</strong></p>
<p>
GSTIN, i.e. Goods and Services Tax Identification Number is a business’s legal and unique identity with the government of India in the GST regime. GSTIN is a 15 alphanumeric character, PAN based distinctive number, allotted state-wise.
</p>
<p><strong>CGST, SGST and IGST</strong></p>
<p>
GST consists of three major taxes – Central GST, i.e. CGST, State GST i.e. SGST and Integrated GST i.e. IGST.
<br>
The different taxes would enable the tax payers to take credit against each other, enhancing ease and transparency in the taxation cycle.
<ul>
<li>CGST</li>
Central GST [CGST] is the GST, to be levied by the Centre, on inter-state businesses.
<li>SGST</li>
State GST [SGST] is the GST, to be levied by the State, on inter-state businesses.
<li>IGST</li>
Integrated GST [IGST] is the GST, to be levied by the Centre, on intra-state businesses and imports.
</ul>
</p>
<p><strong>Reverse Charge</strong></p>
<p>
Reverse Charge is a mechanism and supervisory arrangement to monitor and increase the tax coverage, compliance, synchronization and track-ability amongst unorganized, partly organized and fully organized sectors.
<br>
Generally, the supplier of goods or services is liable to pay GST. However, in specified cases like imports and other notified supplies, the liability may switch to the recipient under the reverse charge mechanism. Reverse charge means the liability to pay tax rests on the recipient of supply of goods or services instead of the supplier, however only on special categories of supply.
</p>
<p><strong>Mixed Supply</strong></p>
<p>
A mixed supply is a combination of two or more individual supplies of goods or services or any other arrangement of goods or services made by a GST payer for a single price. The components of the mixed supply are not organically bundled but it is an intentional fusion from business perspective.
<br>
A mixed supply could be a gifting set comprising of a pen, a tie, a wallet and a key ring.
</p>
<p><strong>Composite Supply</strong></p>
<p>
A composite supply is an organic combination of two or more individual supplies of goods and services or any other natural arrangement of goods or services made by a GST payer for a single price.
<br>
A composite supply is further broken into two parts:
<STRONG>Principal Supply:</STRONG>The major and the foremost element in the Composite Supply of goods or services.
<STRONG>Dependent Supply:</STRONG> This is the depending element and rests on the Principal Supply.
A composite supply could be a breakfast coupled with the stay package in a hotel, which would be seen as a natural blend. In this case, stay package is the Principal Supply and the breakfast is a Composite Supply.
</p>
<p><strong>Composite Supply</strong></p>
<p>
Continuous Supply
A continuous supply is a supply, when the goods and / or services are supplied at a specific interval [fortnight / monthly] and the payments are also received in the same manner.
<br>
A composite supply could be the services provided by a telecom operator.
</p>
<p><strong>ITC</strong></p>
<p>
Input tax credit [ITC] is the credit manufacturers receive for paying input taxes towards inputs used in the manufacture of products. Likewise, a dealer is entitled to input tax credit, if he has purchased goods for resale.
<br>
To avoid double taxation on items used as inputs to make other items, credit of taxes paid on the inputs can be taken by the maker of the next item while paying tax on the output. If the tax paid on inputs is higher than the tax on the output, the excess can be claimed as a refund.
<br>
Input Tax Credit is not generic for PAN India, differs state-wise and does not apply to the composite tax payers.
</p>
<p><strong>GSTR</strong></p>
<p>
GSTR, i.e. GST Return is a document capturing the details of the income, which a tax payer is supposed to file with the authorities to calculate his tax liability. There are total eleven types of GST returns, starting from GSTR-1 to GSTR-11, capturing and catering to different forms of tax payers.
</p>
<p><strong>GST Compliance Rating</strong></p>
<p>
GST Compliance Rating is primarily a numerical value and a score between [0 -10] assigned by the government to all the tax payers, which speaks about being their GST compliance. The rating is assigned to all the GSTIN and GSTUIN holders based on a number of factors including but not limited to your return filing habits on time, accuracy of your fed data etc. among many others.
<br>
Though the actual rating format is still to be announced, however it should be similar to having a 0-10 scale, where zero accounts for the lowest score and 10 denotes a cent percent compliance.
<br>
To avail the ITC and also keep it flowing seamlessly, the rating would be a critical factor. If the ITC is not available smoothly, the working capital will also be impacted adversely. The rating will also impact the legitimate buyers to avail the input tax credit, if the suppliers is not complying up to the mark.
</p>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header bg-white rounded" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link font-weight-bold collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          GST Registration
        </button>
      </h5>
    </div>


    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body text-justify">
        


      	<p>The process of GST registration involves filling and submitting an online application in order to obtain an unique GST Identification Number (GSTIN).</p>


<div><p>This section will cover the following topics:</p>

<ul>
<li><a href="#eligibility">Eligibility</a></li>
<li><a href="#RequiredD">Required Documents</a></li>
<li><a href="#RegistrationP">Registration process for existing tax payers</a></li>
<li><a href="#RegistrationN">Registration process for new applicants</a></li>
<li><a href="#GSTIN">GSTIN (GST Identification Number)</a></li>
<li><a href="#Checking">Checking the status of your Application</a></li>
</ul>
</div>



<p>Before diving into the process involved in GST registration, let&rsquo;s take a look at the eligibility criteria for GST registration.</p>

<h4>Eligibility</h4>
<section id="eligibility">
<p>Businesses with an aggregate turnover exceeding Rs. 20 lakhs must mandatorily register and pay for GST.
Threshold limit is based on the yearly aggregate turnover of a business.</p>

<p><strong>Aggregate turnover</strong> is the sum of all taxable, non-taxable, and exempt supplies. It also includes export of goods and services (if any).</p>

<p>Apart from the above mentioned criteria, there are a few cases where GST registration is mandatory. They are:</p>

<ul>
<li>Businesses involving inter-state supply of goods and services</li>
<li>Casual taxable person</li>
<li>Non-resident taxable person</li>
<li>People who supply goods and services on behalf of a taxable person</li>
<li>An online business that offers services under the aggregator model. For example, businesses supplying online information and database access or retrieval services from a place outside India to a non-registered person in India.</li>
<li>Input service distributors</li>
<li>Business owners who were registered under the pre-GST law</li>
<li>Business owners paying tax under the reverse charge mechanism</li>
<li>E-commerce operators who collect tax at source</li>
</ul>
</section>

<section id="RequiredD">
<h4>Required Documents</h4>
<p>While registering for GST, please make sure that you have soft copies of the documents mentioned below:</p>

<h5>Private Limited Company/Public Company</h5>

<p> <strong>Documents related to the business</strong></p>

<ul>
<li>PAN card</li>
<li>Registration Certificate of the firm</li>
<li>Memorandum of Association (MOA) /Articles of Association (AOA)</li>
<li>Copy of Bank Statement</li>
<li>Declaration to comply with the provisions</li>
<li>A copy of Board Resolution</li>
</ul>

<p><strong>Documents related to directors</strong></p>

<ul>
<li>PAN and ID proof of directors</li>
</ul>

<p><strong>Documents related to the office</strong></p>

<ul>
<li>Copy of electricity/landline/water bill</li>
<li>NOC (no objection certificate) issued by the business owner</li>
<li>Rent agreement (if the business premises are rented)</li>
</ul>

<h5>Limited Liability Partnership</h5>

<p><strong>Documents related to the business</strong></p>

<ul>
<li>PAN card </li>
<li>Registration Certificate of the LLP</li>
<li>LLP Partnership Agreement</li>
<li>Copy of Bank Statement of the LLP</li>
<li>Declaration to comply with the provisions</li>
<li>A copy of Board Resolution</li>
</ul>

<p><strong>Documents related to the business partners</strong></p>

<ul>
<li>PAN and ID proof of the business partners</li>
</ul>

<p><strong>Documents related to the office</strong></p>

<ul>
<li>Copy of electricity bill/landline/water bill</li>
<li>NOC (no objection certificate) issued by the business owner</li>
<li>Rent agreement (if the business premises are rented)</li>
</ul>

<h5>Normal Partnerships</h5>

<p><strong>Documents related to the business</strong></p>

<ul>
<li>PAN card</li>
<li>Partnership Deed</li>
<li>Copy of Bank Statement</li>
<li>Declaration to comply with the provisions</li>
</ul>

<p><strong>Documents related to the business partners</strong></p>

<ul>
<li>PAN and ID proof of partners</li>
</ul>

<p><strong>Documents related to the office</strong></p>

<ul>
<li>Copy of electricity bill/landline/water bill</li>
<li>NOC (no objection certificate) issued by the business owner</li>
<li>Rent agreement (if the business premises are rented)</li>
</ul>

<h5>Sole proprietorship/Individual ownership</h5>

<p><strong>Documents related to the business</strong></p>

<ul>
<li>PAN card and ID proof of the individual</li>
<li>Copy of Cancelled cheque or bank statement</li>
<li>Declaration to comply with the provisions</li>
</ul>

<p><strong>Documents related to the office</strong></p>

<ul>
<li>Copy of electricity/landline/water bill</li>
<li>NOC (no objection certificate) issued by the business owner</li>
<li>Rent agreement (if the business premises are rented)</li>
</ul>
</section>
<section id="RegistrationP">
<h4>Registration process for existing tax payers</h4>

<p>If you&rsquo;re an existing tax payer, you will receive a provisional username and password from the tax authority under whom you are registered. You can also reach out to the tax department to obtain the provisional username and password.</p>

<p>You will have to use these credentials to log into the GST portal and submit the necessary forms for obtaining GST registration. To start with the registration process,</p>

<ul>
<li>Log on to <strong><a href="https://www.gst.gov.in/">www.gst.gov.in</a></strong></li>
<li>Click <strong>New user login</strong> and enter your provisional username and password.</li>
</ul>

<p><center><img src = "images/gst1.png"></center></p>

<ul>
<li>Click <strong>Login</strong></li>
<li>In the screen that follows, you will be prompted to enter your email address and mobile number.</li>
<li>A <strong>One Time password (OTP)</strong> will be sent to your registered email address and mobile number. (The one you receive in your email and the one you receive on your mobile number are different). Enter both the OTPs to complete the verification.</li>
</ul>

<p><center><img src = "images/gst2.png"></center></p>

<ul>
<li>Once the process is done, you will be taken to the screen where you will be asked to select a new username and password for your GST portal.</li>
</ul>

<p><center><img src = "images/gst3.png"></center></p>

<ul>
<li>Enter the username and password of your choice and click <strong>Submit</strong>.
You will get a success message informing about the update of your new username and password. You will then be redirected to the login screen where you will again have to login using your new username and password.</li>
</ul>

<p><center><img src = "images/gst5.png"></center></p>

<p>The next step is to register for GST and receive a provisional GST number.</p>

<ul>
<li>As soon as you log in, you will see the dashboard of the GST portal.</li>
<li>In the dashboard, click <strong>Provisional enrolment</strong> option present on the top left corner.</li>

<li><p>Under provisional enrolment, you will have seven sections which you will have to fill before submitting your application. They are:</p>

<ul>
<li>Business details</li>
<li>Details about proprietor and partner</li>
<li>Authorized signatory</li>
<li>Principal place of business</li>
<li>Additional place of business</li>
<li>Goods and services</li>
<li>Bank accounts</li>
</ul></li>

<li><p>Under each section you will be asked to fill a form and upload the relevant document(s). For example, while filling the <strong>Business Details</strong> section, you will be asked to upload the proof of constitution of business i.e. proof for registering your business. Similarly, you will be asked for an address proof for your business while filling the <strong>Principal Place of Business section</strong>. So, keep a digital copy of all your necessary documents ready before filling up the applications. This will save you a lot of time.</p></li>

<li><p>After filling up all the seven sections, you will have to verify your details using <strong>Digital Signature Certificate (DSC)</strong> or <strong>E-signature</strong>. Enrolment for GST is not complete without the E-signature.</p></li>

<li><p>Upon digitally signing the application, you will receive an acknowledgement email in your registered email address.</p></li>

<li><p>If all the submitted documents are correct, the application would be processed within 3 working days and a provisional registration certificate will be issued to you. The provisional certificate is valid for 6 months and can be used until you receive the GSTIN.</p></li>
</ul>
</section>
<section id="RegistrationN">
<h4>Registration process for new applicants</h4>

<p>GST registration for new applicants is open from June 25, 2017 and will stay open for the next three months.</p>

<p>To apply for a new GSTIN, please follow the steps mentioned below:</p>

<ul>
<li>Go to <strong><a href="http://www.gst.gov.in/">www.gst.gov.in</a></strong></li>
<li>Click the <strong>Services</strong> dropdown from the homepage, and navigate to <strong>Registration &gt; New Registration</strong></li>
</ul>

<p><center><img src = "images/gst6.png" height="340" width="800"></center></p>

<ul>
<li>Select the <strong>New Registration</strong> option, in the screen that follows.</li>
</ul>

<p><center><img src = "images/gst7.png" height="340" width="800"></center></p>

<ul>
<li>Fill the details of the form and an OTP will be sent to your email address and mobile number. Please note that OTPs sent to your email address and mobile number are different.</li>
<li>Enter the OTPs and click <strong>Proceed</strong>.</li>
<li>You will be taken inside the portal where you will be asked to fill other details such as your company name, authorized signatory, PAN information etc.</li>
<li>You will also be asked to upload digital copies of your PAN and company registration document, etc.</li>
<li>Once you complete the form, you will be sent a success message and reference number to your email address and mobile number.</li>
<li>A provisional GSTIN will be sent to you in a couple of weeks.</li>
</ul>
</section>
<section id="GSTIN">
<h4>GSTIN (GST Identification Number)</h4>

<p>GSTIN is a 15-digit identification number issued by the tax department upon successful processing of your application.</p>

<p><center><img src = "images/gst8.png"></center></p>

<p>Decoding the GSTIN will give us the following information:</p>

<ul>
<li>The first two digits represent the state code.</li>
<li>The next ten digits represent the PAN number of the business owner.</li>
<li>The next two digits represent the entity code of the PAN holder in a state.</li>
<li>The fifteenth digit is the checksum digit.</li>
</ul>
</section>
<section id="Checking">
<h4>Checking the status of your Application</h4>

<p>You can track the status of your GST application by following the steps mentioned below:</p>

<ul>
<li>Log on to <a href="https://www.gst.gov.in/">www.gst.gov.in</a>** and scroll down to the bottom of the page.</li>
<li>Under <strong>Important Links</strong>, click <strong>Check Registration Status</strong></li>
</ul>

<p><center><img src = "images/gst9.png"></center></p>

<ul>
<li>In the screen that follows, you can check the status of your application by entering either your registration number, provisional ID, or your PAN number.</li>
</ul>
</section>



      </div>
    </div>
  </div>
</div>

	</div>
</div>
<?php
	include("inclds/footer.php");
?>