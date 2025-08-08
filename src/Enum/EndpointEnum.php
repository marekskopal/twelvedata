<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum EndpointEnum: string
{
    case PriceTarget = 'price_target';
    case Recommendations = 'recommendations';
    case Statistics = 'statistics';
    case InsiderTransactions = 'insider_transactions';
    case Profile = 'profile';
    case InstitutionalHolders = 'institutional_holders';
    case AnalystRating = 'analyst_rating';
    case IncomeStatement = 'income_statement';
    case IncomeStatementQuarterly = 'income_statement_quarterly';
    case CashFlow = 'cash_flow';
    case CashFlowQuarterly = 'cash_flow_quarterly';
    case BalanceSheet = 'balance_sheet';
    case BalanceSheetQuarterly = 'balance_sheet_quarterly';
    case MutualFundsList = 'mutual_funds_list';
    case MutualFundsWorldSustainability = 'mutual_funds_world_sustainability';
    case MutualFundsWorldSummary = 'mutual_funds_world_summary';
    case MutualFundsWorldRisk = 'mutual_funds_world_risk';
    case MutualFundsWorldPurchaseInfo = 'mutual_funds_world_purchase_info';
    case MutualFundsWorldComposition = 'mutual_funds_world_composition';
    case MutualFundsWorldPerformance = 'mutual_funds_world_performance';
    case MutualFundsWorld = 'mutual_funds_world';
    case EtfsList = 'etfs_list';
    case EtfsWorld = 'etfs_world';
    case EtfsWorldSummary = 'etfs_world_summary';
    case EtfsWorldPerformance = 'etfs_world_performance';
    case EtfsWorldRisk = 'etfs_world_risk';
    case EtfsWorldComposition = 'etfs_world_composition';
}
