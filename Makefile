#############
# Variables #
#############

COLOR_RESET   = \033[0m
COLOR_INFO    = \033[32m
COLOR_COMMENT = \033[33m

########
# Help #
########

default: help
.PHONY: help

help: ## Display this help message
	@printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	@printf " make [target]\n\n"
	@printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; { \
		printf " ${COLOR_INFO}%-30s${COLOR_RESET} %s\n", $$1, $$2 \
	}'

################
# Dependencies #
################

vendor: composer.json composer.lock
	composer install

.PHONY: install

install: vendor ## Install dependencies

###########
# Testing #
###########

.PHONY: test code-style ci

test: ## Run Run unit tests
	./vendor/bin/phpspec run -fpretty

code-style: vendor ## Fix code style
	./vendor/bin/php-cs-fixer fix

ci: vendor ## Run CI tests and exit if defect found
	./vendor/bin/php-cs-fixer fix -v --dry-run
	./vendor/bin/phpspec run -fdot
