---
files: 
    test/item: resources/components/search/item.blade.php
    nav: resources/components/search/nav.blade.php
    nav-item: resources/components/search/search.blade.php
    
name: copper search 
---

# Installation

Thank you for purchasing this plugin.

This guide provides detailed instructions on installing and using this plugin. Should you have any inquiries, encounter a bug, require support, or wish to submit a feature request, please do not hesitate to contact me at charrafimedfilament@gmail.com

## Activating Your License on AnyStack
 AnyStack to handle payment, licensing, and distribution for this global search modal.

During the purchasing process, AnyStack will provide you with a license key. You will also be asked by AnyStack to activate your license by providing a domain. This is usually the domain where your final project will be hosted. You’ll use this same domain to install locally and in production. Once you have provided a domain, your license key will be activated, and you can proceed with installing Composer below.

**Tip:** If you missed this step or need to add additional domains for other projects, you can access the activation page by going to Transactions in your AnyStack account and then clicking View details on the Advanced Tables product.

**Tip:** You will need both your license key and your domain to authenticate when you install the package with Composer.

## Installing with Composer

To install Global Search Modal, add the package to your `composer.json` file:

```json
{
    "repositories": [
        {
            "type": "composer",
            "url": "https://.composer.sh"
        }
    ]
}

```
Once the repository has been added to your composer.json file, you can install the global search modal like any other composer package using the composer require command

```bash
    composer require charrafimed/global-search-modal
```

During installation, you will be prompted to enter your username and password:

```
Loading composer repositories with package information
Authentication required (global-search-modal.composer.sh):
Username: [license-email]
Password: [license-key]

```

Your username is your email address, and the password should be your license key followed by a colon (:), and then the domain you are activating. For example, if your details are:
- Contact email: your_email@gmail.com
- License key: 8c21dfde-6273-4932-b4ba-8bcc723efced
- Activation fingerprint: your_domain.com


You should enter the following when prompted:

```
Loading composer repositories with package information
Authentication required (global-search-modal.composer.sh):
Username: your_email@gmail.com
Password: 8c21dfde-6273-4932-b4ba-8bcc723efced:your_domain.com
```

Ensure that the license key and domain fingerprint are separated by a colon (:).

**Tip**: If you encounter a 402 error, it's likely because the colon and domain fingerprint were not included correctly.
## Configuring
### plugin per panel 

```php{1}
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugins([
            GlobalSearchModalPlugin::make()
        ])
}
```
that's it, if you have global search enabled in your panel, so you have a fully featured experience   
## Customize modal behaviors

###  Close by escaping : 
by default this plugin comes with close-by escaping enabled, if  you want to  customize the close-by escaping behavior you can do it like so : 
```php{1}
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugins([
            GlobalSearchModalPlugin::make()
                ->closeByEscaping(enabled: false)
        ])
}
```
###  close clicking by clicking away :
by default this plugin comes with a modal that can close by clicking away enabled, if  you want to  customize the close by clicky away behavior you can do it like so : 
```php{1}
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugins([
            GlobalSearchModalPlugin::make()
                ->closeByClickingAway(enabled: false)
        ])
}
```
###  close button 
By default, the plugin does not include a close button. To add a close button:

```php{1}
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugins([
            GlobalSearchModalPlugin::make()
                ->closeButton(enabled: true)
        ])
}
```

###  Swappable on mobile
To  disable swiping to close on mobile:


```php{1}
use CharrafiMed\GlobalSearchModal\GlobalSearchModalPlugin;
 
public function panel(Panel $panel): Panel
{
    return $panel
        ...
        ->plugins([
            GlobalSearchModalPlugin::make()
                ->SwappableOnMobile(enabled: false)
        ])
}