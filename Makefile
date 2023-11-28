.PHONY: it
it: refactoring coding-standards security-analysis static-code-analysis tests ## Runs the refactoring, coding-standards, security-analysis, static-code-analysis, and tests targets

.PHONY: code-coverage
code-coverage: vendor ## Collects coverage from running integration tests with phpunit/phpunit
	mkdir -p .build/phpunit/
	vendor/bin/phpunit --configuration=test/Integration/phpunit.xml --coverage-text

.PHONY: coding-standards
coding-standards: vendor ## Lints YAML files with yamllint, normalizes composer.json with ergebnis/composer-normalize, and fixes code style issues with friendsofphp/php-cs-fixer
	yamllint -c .yamllint.yaml --strict .
	composer normalize
	mkdir -p .build/php-cs-fixer/
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php --diff --verbose
	vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.fixture.php --diff --verbose

.PHONY: dependency-analysis
dependency-analysis: phive vendor ## Runs a dependency analysis with maglnet/composer-require-checker
	.phive/composer-require-checker check --config-file=$(shell pwd)/composer-require-checker.json --verbose

.PHONY: help
help: ## Displays this list of targets with descriptions
	@grep -E '^[a-zA-Z0-9_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: phive
phive: .phive ## Installs dependencies with phive
	mkdir -p .build/phive/
	PHIVE_HOME=.build/phive phive install --trust-gpg-keys 0x033E5F8D801A2F8D

.PHONY: refactoring
refactoring: vendor ## Runs automated refactoring with rector/rector
	mkdir -p .build/rector/
	vendor/bin/rector process --config=rector.php

.PHONY: security-analysis
security-analysis: vendor ## Runs a security analysis with composer
	composer audit

.PHONY: static-code-analysis
static-code-analysis: vendor ## Runs a static code analysis with phpstan/phpstan and vimeo/psalm
	mkdir -p .build/phpstan/
	vendor/bin/phpstan clear-result-cache --configuration=phpstan.neon
	vendor/bin/phpstan --configuration=phpstan.neon --memory-limit=-1
	mkdir -p .build/psalm/
	vendor/bin/psalm --config=psalm.xml --clear-cache
	vendor/bin/psalm --config=psalm.xml --show-info=false --stats --threads=4

.PHONY: static-code-analysis-baseline
static-code-analysis-baseline: vendor ## Generates a baseline for static code analysis with phpstan/phpstan and vimeo/psalm
	mkdir -p .build/phpstan/
	vendor/bin/phpstan clear-result-cache --configuration=phpstan.neon
	vendor/bin/phpstan --allow-empty-baseline --configuration=phpstan.neon --generate-baseline=phpstan-baseline.neon --memory-limit=-1
	mkdir -p .build/psalm/
	vendor/bin/psalm --config=psalm.xml --clear-cache
	vendor/bin/psalm --config=psalm.xml --set-baseline=psalm-baseline.xml

.PHONY: tests
tests: vendor ## Runs integration tests with phpunit/phpunit
	mkdir -p .build/phpunit/
	vendor/bin/phpunit --configuration=test/Integration/phpunit.xml

vendor: composer.json composer.lock
	composer validate --strict
	composer install --no-interaction --no-progress
