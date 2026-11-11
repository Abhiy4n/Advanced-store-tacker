#!/usr/bin/env bash
# Generates tool-specific files from the single sources: AGENTS.md and .ai/agents/
set -euo pipefail
cd "$(dirname "$0")/.."
mkdir -p .claude/agents .github
cp .ai/agents/*.md .claude/agents/          # Claude Code subagents
printf '@AGENTS.md\n' > CLAUDE.md          # Claude Code reads AGENTS.md via import
cp AGENTS.md .github/copilot-instructions.md  # GitHub Copilot
echo "Synced. Edit AGENTS.md and .ai/agents/ only; never the generated copies."
