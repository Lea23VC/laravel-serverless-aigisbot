# Load environment variables from .env file
include .env

# Command to create individual secrets from .env file
create_secrets:
	@echo "Creating secrets for $(OWNER)/$(REPO_NAME)..."
	@set -a; \
	while IFS='=' read -r var value; do \
		if [[ $$var != "" && $$value != "" ]]; then \
			value=$$(echo "$$value" | sed "s/'//g"); \
			echo "Creating secret $$var with value: $$value..."; \
			echo "$$value" | gh secret set $$var --body $$value ; \
		fi; \
	done < .env
	@echo "Secrets created successfully."

.PHONY: create_secrets
