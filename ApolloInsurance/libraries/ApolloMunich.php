<?php
namespace FakeInsurance\InsuranceClass;

//Visit https://buy.apollomunichinsurance.com/optima-restore-family site.
class ApolloMunich{
    
    private $user_name;
    private $mother;
    private $father;
    private $address;
    private $nominee;
    private $policy_no;
    private $policy_start_date;
    private $contact_no;
    private $generation_date;

    function __construct(){
      $global_variables=parse_ini_file("global_variables.ini");
      $this->username=$global_variables['name'];
      $this->mother=$global_variables['mother'];
      $this->father=$global_variables['father'];
      $this->address=$global_variables['address'];
      $this->nominee=$global_variables['nominee'];
      $this->insurance_for=$global_variables['insurance_for'];
      $this->policy_no=$global_variables['policy_no'];
      $this->policy_start_date=$global_variables['start_date'];
      $this->contact_no=$global_variables['contact_no'];
      $this->policy_date=$global_variables['policy_date'];
      $this->payment_date=$global_variables['payment_date']; 
      $this->gstin_no=$global_variables['gstin_no']; 
      $this->first_inception_date=$global_variables['first_inception_date']; 
      $this->nominee_relationship=$global_variables['nominee_relationship']; 
      $this->total_sum_assured=$global_variables['total_sum_assured']; 
      $this->taxable_amount=$global_variables['monthly_premium']/(1.18);
      $this->state_gst=$this->country_gst=($this->taxable_amount)*0.09;
      $this->total_premium=$global_variables['monthly_premium']; 
      $this->multiplier_benefit=$this->total_sum_assured/2;
    }

    function debug($data){
        echo "<pre>";
        print_r($data); 
        echo "</pre>";
    }

    public function getHeader($digital_signed=1){
        $digital_signed_text=($digital_signed==1)?"<div class='digital_signed_text'>Digitally signed by Padmesh Nair<br> Date {$this->policy_start_date}</div>":"&nbsp;";
        $html="<div class='orange_border'>$digital_signed_text</div>";
        $html.="<div class='logo_area'><img src='images/logo.png'></div>";
        $html.="<div class='header_right'>&nbsp</div>";
        
        return $html;
    }

    function getPageOne(){
        $html="<div class='address_box'>Mr {$this->username}<br>{$this->address}<br>Contact No.: {$this->contact_no}<br>Policy No.: {$this->policy_no}</div>";
        $html.="<div class='container_details'>This Policy Kit contains: <br> 1. The Policy Schedule along with income tax (80D) certificate (wherever applicable)<br>2. Member cashless card/s</div>";
        $html.="<div class='page_one_content'><div style='text-align:center'>Renewal of Your Optima Restore Insurance Policy</div>";
        $html.="<br>Dear Mr {$this->username}, <br><br> Thank You for renewing the policy with us.<br><br>";
        $html.="We are pleased to enclose your renewed Policy Kit for the period {$this->policy_date}.<br><br>";
        $html.="To know more about policy related information and value added offers, you may re-register yourself at our website using
        your unique member ID and policy number as mentioned in the policy schedule.<br><br>";
        $html.="In case of any query, please feel free to write to customerservice@apollomunichinsurance.com or call us at our 24 hours
        toll free number 1800-102-0333. Our customer care team will be happy to assist you.";
        $html.="<br><br>Warm Regards,<br> <img src='images/padmesh.png'>";
        $html.="<br><br>Authorized Signatory";
        $html.="<div class='location_payment_date'>Location: Gurgaon<br>Date: 27-May-2019</div>";
        $html.="<br><br><br>Note:-<br><br>";
        $html.="<div class='bullet_points'>- Please visit our website www.apollomunichinsurance.com to access information about our company, the customer service touch
        points including the Grievance handling process and various forms that you can use for service support. You will also get latest
        updates on products, policy wordings which you can download for your reference and record.</div><br>";
        $html.="<div class='bullet_points'>- Please update us with your latest contact details (in case of any change) so that same can be updated in our records.
        You can either write back to us or call us on our toll free no. 1800-102-0333.</div>";
        $html.="<table class='intermediary_table' border='1' cellspacing='0'><tr><th>Intermediary Code</th><th>Intermediary Name</th><th>Intermediary Contact No</th></tr>";
        $html.="<tr><td>80091049</td><td>Tele Marketing Bangalore.</td><td>18001020333</td></tr></table>";

        
        $html.="</div>"; //Page one ends here.
        return $html; 
    }

    function getPageTwo(){
      $html="<div class='page_two'>";
      $html.="<div style='text-align:center'>OPTIMA RESTORE POLICY SCHEDULE - Optima Restore Floater</div><br>";
      $html.="<table class='policy_details_table'>";
      $html.="<tr><td class='left'>Issuing/Servicing Office:</td><td>Bangalore Branch Office,Office Nos, 105-A, 106-A,107-A &<br>108A, 136, First Floor,Cears Plaza, Residency Road, Opp.<br>Bangalore Club,Bangalore,Karnataka-560025,PH :<br>08041435333</td></tr>";
      $html.="<tr><td class='left'>GSTIN:</td><td>{$this->gstin_no}</td></tr>";
      $html.="<tr><td class='left'>Policy Holder's Name:</td><td>{$this->username}</td></tr>";
      $html.="<tr><td class='left'>GSTIN/ UIN (if any) of Policy Holder:</td><td>&nbsp;</td></tr>";
      $html.="<tr><td class='left'>Policy Holder's Address: </td><td>{$this->address}</td></tr>";
      $html.="<tr><td class='left'>Policy Holder State Name & Code:</td><td>Karnataka(29)</td></tr>";
      $html.="<tr><td class='left'>Intermediary Code: </td><td>80091049</td></tr>";
      $html.="<tr><td class='left'>Intermediary Name:</td><td>Tele Marketing Bangalore</td></tr>";
      $html.="<tr><td class='left'>Intermediary Contact No:</td><td>18001020333</td></tr>";
      $html.="<tr><td class='left'>Policy Number:</td><td>{$this->policy_no}</td></tr>";
      $html.="<tr><td class='left'>First policy inception date:</td><td>{$this->first_inception_date}</td></tr>"; 
      $html.="<tr><td class='left'>Policy issuance date:</td><td>{$this->payment_date}</td></tr>"; 
      $html.="<tr><td class='left'>Description/ Harmonized System of Nomenclature Code:</td><td>Accident and Health insurance Services/ 9971</td></tr>";
      $html.="<tr><td class='left'>Policy Period:</td><td>{$this->policy_date}</td></tr>";
      $html.="<tr><td class='left'>Place of Supply:</td><td>Bangalore (Karnataka)</td></tr>";
      $html.="<tr><td class='left'>Nominee Name:</td><td>{$this->nominee}</td></tr>";
      $html.="<tr><td class='left'>Relationship:</td><td>{$this->nominee_relationship}</td></tr>";
      $html.="<tr><td class='left'>Insured Persons Details:</td><td>&nbsp; </td></tr>";
      $html.="</table><br>";

      $html.="<table border='1' cellspacing='0' class='policy_holders_table'>";
      $html.="<tr><th>MemberID</th><th>Insured Person's Name</th><th>Age</th><th>Relationship<br>to<br>Policy Holder</th><th>Basic Sum<br>Insured<br>(Rs.)</th><th>Critical<br>Advantage<br>Sum Insured<br>(USD$)</th><th style='display:none'>Multiplier<br>Benefit<br>(Rs)</th><th>Critical<br>Advantage<br>Rider Premium<br>(Rs)</th><th>Gross<br>Premium<br>(Rs)</th></tr>";
      if($this->insurance_for=="self"){
        $html.="<tr><td>10011883623</td><td>{$this->username}</td><td>30</td><td>Policy Holder</td><td align='top' rowspan='2'>{$this->total_sum_assured}</td><td>0</td><td rowspan='2' style='display:none'>{$this->multiplier_benefit}</td><td>0</td><td rowspan='3'>$this->total_premium</td></tr>";
        $html.="<tr><td>10011883626</td><td>{$this->nominee}</td><td>37</td><td>Brother</td><td>0</td><td>0</td></tr>";
      }
      else{
        $html.="<tr><td>10011883676</td><td>{$this->mother}</td><td>61</td><td>Policy Holder</td><td align='top' rowspan='2'>{$this->total_sum_assured}</td><td>0</td><td rowspan='2' style='display:none'>{$this->multiplier_benefit}</td><td>0</td><td rowspan='3'>$this->total_premium</td></tr>";
        $html.="<tr><td>10011883677</td><td>{$this->father}</td><td>68</td><td>Husband</td><td>0</td><td>0</td></tr>"; 
      }
      $html.="</table>";

      $html.="<br>The nominee must be an immediate relative of the policyholder. For all other Insured Persons the policy holder shall be the nominee.<br>";
      $html.="<br><u>Premium Calculation:</u>";

      $html.="<table class='premium_calculation'>";
      $html.="<tr><td class='left'>Net Premium</td><td>(Rs)</td><td class='right'>".number_format($this->taxable_amount,2)."</td></tr>";
      $html.="<tr><td class='left'>Discounts</td><td>(Rs)</td><td class='right'>0.00</td></tr>";
      $html.="<tr><td class='left'>Loadings</td><td>(Rs)</td><td class='right'>0.00</td></tr>";
      $html.="<tr><td class='left'>Taxable Premium</td><td>(Rs)</td><td class='right'>".number_format($this->taxable_amount,2)."</td></tr>";
      $html.="<tr><td class='left'>CGST@9%</td><td>(Rs)</td><td class='right'>".number_format($this->country_gst,2)."</td></tr>";
      $html.="<tr><td class='left'>SGST/UTGST@9%</td><td>(Rs)</td><td class='right'>".number_format($this->state_gst,2)."</td></tr>";
      $html.="<tr><td class='left'>IGST@0%</td><td>(Rs)</td><td class='right'>0.00</td></tr>";
      $html.="<tr><td class='left'>Any other Cess or Taxes</td><td>(Rs)</td><td class='right'>0.00</td></tr>";
      $html.="<tr><td class='left'>Gross Premium</td><td>(Rs)</td><td class='right'>".number_format($this->total_premium,2)."</td></tr>";
      $html.="</table>";

     
      $html.="</div>";
      return $html;
    }

    function getPageThree(){

        $html="<div class='page_three'>The stamp duty of Rs. 1.00/- (Rupees One Only) paid vide No.F.10(783)/COS(HQ)/Con.duty/08. (Not applicable for the state of Jammu & Kashmir).";
        $html.="Original for Recipient/ Duplicate for Supplier <br>";
        $html.="Whether tax is payable on reverse charge basis <span style='margin-left:300px;display:inline-block'>NO</span>";
        $html.="<table border='1' cellspacing='0' class='reverse_charge_basis'>";
        $html.="<tr><td colspan='3'>EXCLUSION(S) / SPECIAL CONDITION(S):</td></tr>";
        $html.="<tr><td class='left'>Member ID No of Insured</td><td>Person Name</td><td class='right'>Details</td></tr>";
        if($this->insurance_for=="self"){
            $html.="<tr><td>10011883623</td><td>Mr {$this->username}</td><td>For Rs 1000000 (Rupees Ten Lakh) Sum Insured - Sec 5 A (i) and Sec 5 A (ii) of the
            policy wording is waived and Sec 5 A (iii) is reduced to 1 year.<br>
            For Rs 1000000 (Rupees Ten Lakh) Sum Insured - Sec 5 A (i), Sec 5 A (ii) and Sec 5 A
            (iii) of the policy wording is waived.</td></tr>"; 
            $html.="<tr><td>10011883626</td><td>Mrs {$this->nominee}</td><td>For Rs 1500000 (Rupees Fifteen Lakh) Sum Insured - Sec 5 A (i) of the policy wording is
            waived, Sec 5 A (ii) is reduced to 1 year and Sec 5 A (iii) is reduced to 2 years.</td></tr>";
        }
        else {
            $html.="<tr><td>10011883676</td><td>Mr {$this->mother}</td><td>For Rs 1000000 (Rupees Ten Lakh) Sum Insured - Sec 5 A (i) and Sec 5 A (ii) of the
            policy wording is waived and Sec 5 A (iii) is reduced to 1 year.<br>
            For Rs 1000000 (Rupees Ten Lakh) Sum Insured - Sec 5 A (i), Sec 5 A (ii) and Sec 5 A
            (iii) of the policy wording is waived.</td></tr>"; 
            $html.="<tr><td>10011883677</td><td>Mrs {$this->father}</td><td>For Rs 1500000 (Rupees Fifteen Lakh) Sum Insured - Sec 5 A (i) of the policy wording is
            waived, Sec 5 A (ii) is reduced to 1 year and Sec 5 A (iii) is reduced to 2 years.</td></tr>";
        }
        // $html.="<tr><td>10011883627</td><td>Mr {$this->father}</td><td>For Rs 1000000 (Rupees Ten Lakh) Sum Insured - Sec 5 A (i) of the policy wording is
        // waived, Sec 5 A (ii) is reduced to 1 year and Sec 5 A (iii) is reduced to 2 years.</td></tr>";
        $html.="</table>";
        $html.="Claim Administrator: Apollo Munich<span style='margin-left:110px;display:inline-block'>For and on behalf of Apollo Munich Health Insurance Company Limited</span>";
        $html.="<div style='float:right;width:200px;'><img src='images/padmesh.png'><br>Authorized Signatory</div>";
        $html.="<br>Claim Administrator: Apollo Munich <br>(For critical advantage rider:)";
        $html.="<br>Location: Gurgaon<br>";
        $html.="Date: {$this->payment_date}";

        $html.="</div>";
        return $html;

    }

    function getPageFour(){
      $html="<div class='page_four'>";
      $html.="<p style='text-align:center !important'>Certificate for the purpose of deduction under Section 80 D of Income Tax Act, 1961*</p>";
      $html.="<p>This is to certify that {$this->username} has paid Rs {$this->total_premium} towards premium for Optima Restore Floater Policy No {$this->policy_no} issued to Mr {$this->username} for
      period {$this->policy_date}.</p>";      
      $html.="<p style='text-align:right'>For and on behalf of Apollo Munich Health Insurance Company Limited</p>";
      $html.="<div style='float:left'>Location: Gurgaon<br>Date: 27-May-2019</div>";
      $html.="<div style='float:right;bottom:10px;position:relative'><img src='images/padmesh.png'><br>Authorized Signatory</div>";
      $html.="<div style='clear:both;margin-top:20px'>*Note:-</div>";
      $html.="<div class='bullet_points' style='line-height:20px'>1. This is subject to the provisions of Section 80D of Income Tax Act, 1961 as amended from time to time.<br>
      2. This certificate must be surrendered to the company in case of cancellation of this policy. In event of incorrect representation of
       this declaration the liability shall be upon the policy holder.<br>
      3. Please note that this certificate will not be issued if the premium payment has been made in cash.<br>
      4. In case of dishonour of the premium instrument, the policy will be deemed cancelled ab initio.<br>
      5. 80D benefit is applicable for only Self, Spouse, Dependent Children and Dependent parents
      </div>";

      $html.="</div>";
      return $html;
    }

    function getFooter(){
        $html="<div class='footer_left'><img src='images/great_place_to_work.png'></div>";
        $html.="<div class='footer_right'><b>Apollo Munich Health Insurance Co. Ltd.</b><br>";
        $html.="2nd & 3rd Floor, iLABS Centre, Plot No.404-405, Udyog Vihar, Phase-III, Gurgaon, 122 016, Haryana<br>";
        $html.="Corp. Office: 1st Floor, SCF-19, Sector-14, Gurgaon-122 001, Haryana.<br>";
        $html.="Regd. Office: Apollo Hospitals Complex, Jubilee Hills, Hyderabad-500 033, Andhra Pradesh.<br>";
        $html.="<b>Tel: +91-124-4584333 Fax:+91-124-4584111 &#8226; www.apollomunichinsurance.com &#8226; customerservice@apollomunichinsurance.com</b><br>";
        $html.="&#8226; IRDA Registration Number-131 &#8226; Corporate Identity Number: U66030AP2006PLC051760</div>";
        return $html; 
    }
}

?>