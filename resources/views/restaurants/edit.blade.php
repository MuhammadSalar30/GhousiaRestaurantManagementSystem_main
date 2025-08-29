@extends('layouts.admin', ['subtitle' => "Restaurant", 'title' => "Edit Restaurant"])

@section('content')

<div>
    <nav class="flex flex-wrap justify-center gap-4 mb-6" aria-label="Tabs" role="tablist">
        <button type="button" class="hs-tab-active:bg-primary hs-tab-active:text-white py-3 px-20 inline-flex bg-primary/10 text-sm font-medium text-center text-primary rounded-full active" data-hs-tab="#tabBusinessDetail" aria-controls="tabBusinessDetail" role="tab">
            Business Detail
        </button>
        <button type="button" class="hs-tab-active:bg-primary hs-tab-active:text-white py-3 px-20 inline-flex bg-primary/10 text-sm font-medium text-center text-primary rounded-full" data-hs-tab="#tabPersonalDetail" aria-controls="tabPersonalDetail" role="tab">
            Personal Detail
        </button>
        <button type="button" class="hs-tab-active:bg-primary hs-tab-active:text-white py-3 px-20 inline-flex bg-primary/10 text-sm font-medium text-center text-primary rounded-full" data-hs-tab="#tabBankDetail" aria-controls="tabBankDetail" role="tab">
            Bank Detail
        </button>
    </nav>

    <div class="p-6 border rounded-lg border-default-200">
        <div id="tabBusinessDetail" role="tabpanel">
            <h4 class="text-lg font-medium text-default-900 mb-6">Step 1:</h4>

            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="firstName">First Name</label>
                    <input id="firstName" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your First Name" value="Kianna">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="lastName">Last Name</label>
                    <input id="lastName" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Last Name" value="Vetrovs">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="contactNumber">Contact Number</label>
                    <input id="contactNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Contact Number" value="+(123) 456 7890">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="phoneNumber">Phone Number</label>
                    <input id="phoneNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Phone Number" value="+(123) 456 7890">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="emailAddress">Email</label>
                    <input id="emailAddress" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Email" value="kianna.vetrov@mail.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="birthofDate">Birth of Date</label>
                    <input id="birthofDate" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Birth of Date" value="04/12/1998">
                </div>
            </div>

            <div class="grid lg:grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="city">City</label>
                    <input id="city" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your City" value="Kitchener">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="country">Country</label>
                    <input id="country" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Country" value="Canada">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="zipCode">Zip Code</label>
                    <input id="zipCode" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Zip Code" value="45 3424">
                </div>

                <div class="lg:col-span-3">
                    <label class="block text-sm font-medium text-default-900 mb-2" for="description">Description</label>
                    <textarea id="description" class="block w-full bg-transparent rounded-lg py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200" rows="5" placeholder="Enter Description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</textarea>
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    Close
                </button>
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    Save
                </button>
            </div>
        </div>

        <div id="tabPersonalDetail" class="hidden" role="tabpanel">
            <h4 class="text-lg font-medium text-default-900 mb-6">Step 2:</h4>

            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="companyName">Company Name</label>
                    <input id="companyName" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Company Name" value="Healthy Feast Corner">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="companyType">Company Type</label>
                    <input id="companyType" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Company Type" value="Partnership">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="panCardNumber">PAN Card Number</label>
                    <input id="panCardNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter PAN Card Number" value="KGX5793RSD">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="faxNumber">Fax Number</label>
                    <input id="faxNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Fax Number" value="+1 453 345 3424">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="website">Website</label>
                    <input id="website" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter website.com" value="http://healthyfeastcorner.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="exercitation">Email</label>
                    <input id="exercitation" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Email" value="kianna.vetrov@mail.com">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="companyNumber">Number</label>
                    <input id="companyNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Number" value="+(123) 456 7890">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="companyLogo">Company Logo</label>
                    <input type="file" name="companyLogo" id="file-input" class="block w-full bg-transparent border border-default-200 rounded-full focus:ring-transparent focus:outline-none focus:border-default-200 file:bg-default-100 file:border-0 file:me-4 file:py-2.5 file:px-4" placeholder="Upload Your Company Logo">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    Close
                </button>
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    Save
                </button>
            </div>
        </div>

        <div id="tabBankDetail" class="hidden" role="tabpanel">
            <h4 class="text-lg font-medium text-default-900 mb-6">Step 3:</h4>

            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="bankName">Bank Name</label>
                    <input id="bankName" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Bank Name" value="National Bank of Canada">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="bankBranch">Branch</label>
                    <input id="bankBranch" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Branch" value="Alberta">
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-sm font-medium text-default-900 mb-2" for="accountHolderName">Account Holder Name</label>
                    <input id="accountHolderName" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Account Holder Name" value="Kianna Vetrovs">
                </div>


                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="accountNumber">Account Number</label>
                    <input id="accountNumber" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter Your Account Number" value="378282246310005">
                </div>

                <div>
                    <label class="block text-sm font-medium text-default-900 mb-2" for="IFSCCode">IFSC Code</label>
                    <input id="IFSCCode" class="block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Enter IFSC Code" value="BOFA0MM6205">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                    <i data-lucide="x" class="w-5 h-5"></i>
                    Close
                </button>
                <button class="flex items-center justify-center gap-2 rounded-full bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                    <i data-lucide="save" class="w-5 h-5"></i>
                    Save
                </button>
            </div>
        </div>
    </div>
</div>

@endsection