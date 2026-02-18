export const getBaseUrl = () => {
    if (typeof window === 'undefined') {
        return process.env.INTERNAL_API_BASE_URL || process.env.NEXT_PUBLIC_BASE_URL
    }

    return process.env.NEXT_PUBLIC_BASE_URL
}
