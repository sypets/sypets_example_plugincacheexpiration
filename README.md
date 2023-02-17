Example for testing a core patch, see TYPO3 Issue:

* https://forge.typo3.org/issues/92535

And corresponding patch:

* https://review.typo3.org/c/Packages/TYPO3.CMS/+/77894

!!! This extension will only work with the corresponding patch applied.

## Supported versions

* Tested with TYPO3 latest main branch (v12)


## Install

Without Composer:

```shell
git clone https://github.com/sypets/sypets_example_plugincacheexpiration.git
```

With Composer:

Add to composer.json:

```json
"repositories": {
		"sypets_example_plugincacheexpiration": {
			"type": "git",
			"url": "https://github.com/sypets/sypets_example_plugincacheexpiration.git"
		}
},
```

Run:

```shell
composer require sypets/sypets-example-plugincacheexpiration:dev-main
```

## TEST

To test if the patch works, insert a plugin and load the FE page several times.
After about 10 seconds the page cache should be invalidated and you should see
a new timestamp.
